/**
 * Mirrors x-frontend.section-title blade component.
 */
export default function SectionTitle({
  title,
  subtitle = null,
  align = 'left',
  light = false,
  dots = false,
  colClass = 'col-lg-6',
  rowClass = '',
  headingClass = '',
  navSlotId = null,
}) {
  const headingBaseClass = align === 'center' ? 'section-heading' : 'section-heading-left';
  const headingClasses = [headingBaseClass, light ? 'light' : '', headingClass]
    .filter(Boolean)
    .join(' ')
    .trim();
  const rowClasses = ['row', 'align-items-center', dots ? 'ni-heading-dots' : '', rowClass]
    .filter(Boolean)
    .join(' ')
    .trim();
  const titleColClass = navSlotId ? 'col-7 col-md-6' : colClass;

  return (
    <div className={rowClasses}>
      <div className={titleColClass}>
        <div className={headingClasses}>
          {subtitle ? <span>{subtitle}</span> : null}
          <h2>{title}</h2>
        </div>
      </div>
      {navSlotId ? (
        <div className="col-5 col-md-6">
          <div className="section-carousel-nav" id={navSlotId} />
        </div>
      ) : null}
    </div>
  );
}
