import Link from '../components/AppLink';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

const SOCIAL_LABELS = {
  'fab fa-facebook-f': 'Facebook',
  'fab fa-facebook': 'Facebook',
  'fab fa-youtube': 'YouTube',
  'fab fa-linkedin-in': 'LinkedIn',
  'fab fa-linkedin': 'LinkedIn',
  'fab fa-instagram': 'Instagram',
  'fab fa-twitter': 'Twitter',
  'fab fa-x-twitter': 'X',
};

function socialLabel(socialMedia) {
  if (SOCIAL_LABELS[socialMedia]) return SOCIAL_LABELS[socialMedia];
  return String(socialMedia || '')
    .replace(/fab fa-/g, '')
    .replace(/-f$/g, '')
    .replace(/-in$/g, '')
    .split(/[\s-]+/)
    .map((w) => w.charAt(0).toUpperCase() + w.slice(1))
    .join(' ');
}

function FooterPageColumns({ footerPages = [], translations = {} }) {
  const links = Array.isArray(footerPages) ? footerPages : [];
  const col1 = links.slice(0, 4);
  const col2 = links.slice(4, 8);

  return (
    <>
      {col1.length > 0 && (
        <div className="col-6 col-md-6 col-lg-3 footer-widget-resp">
          <div className="footer-widget footer-widget-pl">
            <h6 className="footer-title">{t(translations, 'customer_relationship')}</h6>
            <ul className="footer-links">
              {col1.map((footerPage) => (
                <li key={footerPage.page_slug || footerPage.id}>
                  <Link to={`/page/${footerPage.page_slug}`}>
                    <i className="fas fa-angle-right" />
                    <span>{footerPage.page_title}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </div>
        </div>
      )}
      {col2.length > 0 && (
        <div className="col-6 col-md-6 col-lg-3 footer-widget-resp">
          <div className="footer-widget footer-widget-pl">
            <h6 className="footer-title">{t(translations, 'useful_links')}</h6>
            <ul className="footer-links">
              {col2.map((footerPage) => (
                <li key={footerPage.page_slug || footerPage.id}>
                  <Link to={`/page/${footerPage.page_slug}`}>
                    <i className="fas fa-angle-right" />
                    <span>{footerPage.page_title}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </div>
        </div>
      )}
    </>
  );
}

/**
 * Footer real-data branch from home index.
 */
export default function Footer({ data = {} }) {
  const {
    section_arr = {},
    socials = [],
    site_info,
    footer_pages = [],
    translations = {},
  } = data;

  if (Number(section_arr.footer_section) !== 1) return null;

  const hasContent =
    (socials || []).length > 0 || !!site_info || (footer_pages || []).length > 0;
  if (!hasContent) return null;

  const phoneDigits = String(site_info?.phone || '').replace(/[^0-9]/g, '');

  return (
    <footer className="footer">
      <div className="footer-top">
        <div className="container">
          <div className="row">
            <div className="col-6 col-md-6 col-lg-3 footer-widget-resp">
              <div className="footer-widget">
                <h6 className="footer-title">{t(translations, 'about_us')}</h6>
                <div className="footer-social-links">
                  {(socials || [])
                    .filter((s) => s.social_media !== 'fab fa-whatsapp')
                    .map((social) => (
                      <a
                        key={social.id || social.social_media}
                        href={social.link || '#'}
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <i className={social.social_media} />
                        <span>{socialLabel(social.social_media)}</span>
                      </a>
                    ))}
                </div>
              </div>
            </div>
            <FooterPageColumns footerPages={footer_pages} translations={translations} />
            <div className="col-6 col-md-6 col-lg-3 footer-widget-resp">
              <div className="footer-widget">
                <h6 className="footer-title">Contact Info</h6>
                <div className="footer-contact-info-wrap">
                  <ul className="footer-contact-info-list">
                    {site_info?.address ? (
                      <li>
                        <i className="fas fa-map-marker-alt" />
                        <div className="footer-contact-body">
                          <h6>Address in Details</h6>
                          <p>{site_info.address}</p>
                        </div>
                      </li>
                    ) : null}
                    {site_info?.phone ? (
                      <li>
                        <i className="fab fa-whatsapp" />
                        <div className="footer-contact-body">
                          <h6>WhatsApp</h6>
                          <p>
                            <a
                              href={`https://wa.me/${phoneDigits}`}
                              target="_blank"
                              rel="noopener noreferrer"
                              className="text-white"
                            >
                              {site_info.phone}
                            </a>
                          </p>
                        </div>
                      </li>
                    ) : null}
                    {site_info?.email ? (
                      <li>
                        <i className="fas fa-envelope" />
                        <div className="footer-contact-body">
                          <h6>Email</h6>
                          <p>
                            <a href={`mailto:${site_info.email}`} className="text-white">
                              {site_info.email}
                            </a>
                          </p>
                        </div>
                      </li>
                    ) : null}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {site_info?.copyright ? (
        <div className="copyright">
          <div className="container">
            <p className="copyright-text">{site_info.copyright}</p>
          </div>
        </div>
      ) : null}
    </footer>
  );
}
