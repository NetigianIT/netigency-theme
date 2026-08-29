import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';
import { chunk } from '../utils/chunk';

/**
 * Work process section — real-data branch.
 */
export default function WorkProcessSection({ data = {} }) {
  const { section_arr = {}, work_process_section, work_processes = [] } = data;

  const list = Array.isArray(work_processes) ? work_processes : [];
  if (Number(section_arr.work_process_section) !== 1) return null;
  if (!work_process_section && list.length === 0) return null;

  const rows = chunk(list, 3);
  let delayCounter = 1;
  let stepCounter = 1;

  return (
    <section className="section bg-dark-blue pb-30">
      <div className="container">
        {work_process_section ? (
          <SectionTitle
            title={work_process_section.title}
            subtitle={work_process_section.section_title}
            align="center"
            dots
          />
        ) : null}
        {rows.map((row, rowIdx) => (
          <div className="row ni-work-process-row" key={rowIdx}>
            {row.map((item) => {
              const delay = delayCounter++;
              const step = stepCounter++;
              const stepLabel = String(step).padStart(2, '0');
              return (
                <div
                  className="col-md-4 wow fadeInUp"
                  data-wow-duration="0.7s"
                  data-wow-delay={`0.${delay}s`}
                  key={item.id || item.title || step}
                >
                  <div className="how-i-work-item">
                    <div className="number">
                      <span>{stepLabel}</span>
                    </div>
                    <div className="number-border" />
                    {item.image_status === 'enable' && item.work_process_image ? (
                      <div className="img">
                        <img
                          src={asset(`uploads/img/work_process/${item.work_process_image}`)}
                          className="img-fluid"
                          alt="How i work"
                        />
                      </div>
                    ) : null}
                    <div className="text">
                      <h5>{item.title}</h5>
                    </div>
                  </div>
                </div>
              );
            })}
          </div>
        ))}
      </div>
    </section>
  );
}
