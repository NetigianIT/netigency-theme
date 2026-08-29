/**
 * Laravel public-path helper for SPA assets.
 * @param {string} path
 * @returns {string}
 */
export function asset(path) {
  if (!path) return '/';
  const cleaned = String(path).replace(/^\/+/, '');
  return `/${cleaned}`;
}

export default asset;
