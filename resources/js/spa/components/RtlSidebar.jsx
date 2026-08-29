/**
 * Mirrors Blade #rtlSidebar when section is enabled.
 */
export default function RtlSidebar({ sectionArr = {} }) {
  if (Number(sectionArr.rtl_sidebar) !== 1) return null;

  return (
    <div id="rtlSidebar">
      <button type="button" id="rtlToggle" aria-label="Toggle RTL layout">
        RTL
      </button>
    </div>
  );
}
