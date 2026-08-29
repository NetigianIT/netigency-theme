import { useEffect, useRef, useState } from 'react';
import { useLocation } from 'react-router-dom';
import { reinitAdminPlugins } from '../utils/reinitAdminPlugins';

/**
 * Loads existing Blade admin views as HTML fragments so UI/features stay intact
 * while the shell (sidebar/topbar) is React.
 */
export default function LegacyBladePage() {
  const location = useLocation();
  const mountRef = useRef(null);
  const [html, setHtml] = useState('');
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    let cancelled = false;
    const path = location.pathname + location.search;
    const url = new URL(path, window.location.origin);
    url.searchParams.set('admin_fragment', '1');

    setLoading(true);
    setError(null);

    (async () => {
      try {
        const res = await fetch(url.toString(), {
          credentials: 'same-origin',
          headers: {
            Accept: 'text/html',
            'X-Admin-Fragment': '1',
            'X-Requested-With': 'XMLHttpRequest',
          },
        });

        if (!res.ok) {
          throw new Error(`Failed to load (${res.status})`);
        }

        const text = await res.text();
        if (cancelled) return;
        setHtml(text);
      } catch (err) {
        if (!cancelled) {
          setError(err?.message || 'Failed to load page');
          setHtml('');
        }
      } finally {
        if (!cancelled) setLoading(false);
      }
    })();

    return () => {
      cancelled = true;
      if (typeof window.destroyNiEditor === 'function') {
        window.destroyNiEditor();
      }
    };
  }, [location.pathname, location.search]);

  useEffect(() => {
    if (loading || error || !mountRef.current) return;
    const timer = window.setTimeout(() => {
      reinitAdminPlugins(mountRef.current);
    }, 50);
    return () => window.clearTimeout(timer);
  }, [html, loading, error]);

  if (loading) {
    return (
      <div className="container-fluid py-4">
        <p className="mb-0">Loading…</p>
      </div>
    );
  }

  if (error) {
    return (
      <div className="container-fluid py-4">
        <div className="alert alert-danger mb-0">{error}</div>
        <p className="mt-3 mb-0">
          <a href={location.pathname + location.search}>Open full page</a>
        </p>
      </div>
    );
  }

  return (
    <div
      className="container-fluid"
      ref={mountRef}
      dangerouslySetInnerHTML={{ __html: html }}
    />
  );
}
