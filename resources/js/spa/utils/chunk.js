/**
 * Split an array into chunks (mirrors Laravel Collection::chunk).
 * @param {Array} items
 * @param {number} size
 * @returns {Array[]}
 */
export function chunk(items, size) {
  const list = Array.isArray(items) ? items : [];
  const n = Math.max(1, Number(size) || 1);
  const result = [];
  for (let i = 0; i < list.length; i += n) {
    result.push(list.slice(i, i + n));
  }
  return result;
}

export default chunk;
