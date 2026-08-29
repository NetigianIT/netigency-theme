import { asset } from '../utils/asset';

const SKINS = [
  { className: 'default', path: 'assets/frontend/css/skins/default-color.css' },
  { className: 'blue', path: 'assets/frontend/css/skins/blue-color.css' },
  { className: 'red', path: 'assets/frontend/css/skins/red-color.css' },
  { className: 'yellow', path: 'assets/frontend/css/skins/yellow-color.css' },
  { className: 'pink', path: 'assets/frontend/css/skins/pink-color.css' },
  { className: 'turquose', path: 'assets/frontend/css/skins/turquose-color.css' },
  { className: 'purple', path: 'assets/frontend/css/skins/purple-color.css' },
  { className: 'blue2', path: 'assets/frontend/css/skins/blue-color-2.css' },
  { className: 'orange', path: 'assets/frontend/css/skins/orange-color.css' },
  { className: 'magenta', path: 'assets/frontend/css/skins/magenta-color.css' },
  { className: 'orange2', path: 'assets/frontend/css/skins/orange-color-2.css' },
];

/**
 * Mirrors Blade #colorOptionsSidebar when section is enabled.
 */
export default function ColorOptionsSidebar({ sectionArr = {} }) {
  if (Number(sectionArr.color_option_sidebar) !== 1) return null;

  return (
    <div id="colorOptionsSidebar">
      <div className="color-options-wrap">
        <button type="button" id="colorOptionsSidebarToggle" aria-label="Color options">
          <i className="fa fa-cog fa-spin" />
        </button>
        <div className="color-options-list">
          {SKINS.map((skin) => (
            <span
              key={skin.className}
              className={`color-options-item ${skin.className}`}
              data-skins-css-path={asset(skin.path)}
            />
          ))}
        </div>
      </div>
    </div>
  );
}
