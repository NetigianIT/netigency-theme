import SectionTitle from '../components/SectionTitle';

function counterIcon(title) {
  const t = String(title || '').toLowerCase();
  if (t.includes('client') || t.includes('customer')) return 'fas fa-users';
  if (t.includes('project')) return 'fas fa-check-circle';
  if (t.includes('coffee')) return 'fas fa-mug-hot';
  if (t.includes('award') || t.includes('win')) return 'fas fa-trophy';
  if (t.includes('year') || t.includes('experience')) return 'fas fa-briefcase';
  return 'fas fa-chart-line';
}

/**
 * Counters section — real-data branch.
 */
export default function CountersSection({ data = {} }) {
  const { section_arr = {}, counter_section, counters = [] } = data;

  const list = Array.isArray(counters) ? counters : [];
  if (Number(section_arr.counter_section) !== 1) return null;
  if (!counter_section && list.length === 0) return null;

  return (
    <section className="section counters-section pb-minus-70" id="counters">
      <div className="counters-section-bg" aria-hidden="true" />
      <div className="container">
        {counter_section ? (
          <SectionTitle
            title={counter_section.title}
            align="center"
            light
            colClass="col-lg-8"
            headingClass="counters-heading"
            dots
          />
        ) : null}
        <div className="row justify-content-center counters-grid">
          {list.map((counter, index) => (
            <div
              className="col-md-4 col-sm-6 wow fadeInUp"
              data-wow-duration="0.7s"
              data-wow-delay={`0.${index + 1}s`}
              key={counter.id || counter.title || index}
            >
              <div className="counter-item">
                <div className="counter-item-icon">
                  <i className={counterIcon(counter.title)} aria-hidden="true" />
                </div>
                <div className="counter-item-value">
                  <h3 className="counter">{counter.timer}</h3>
                  <span className="counter-suffix">+</span>
                </div>
                <p>{counter.title}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
