import { asset } from '../utils/asset';

/**
 * Skills / technology section — real-data branch.
 */
export default function SkillsSection({ data = {} }) {
  const { section_arr = {}, skill, skill_info_lists = [] } = data;

  const lists = Array.isArray(skill_info_lists) ? skill_info_lists : [];
  if (Number(section_arr.skill_section) !== 1) return null;
  if (!skill && lists.length === 0) return null;

  return (
    <section className="section skills-section" id="technology" data-scroll-index="5">
      <div className="container">
        <div className="row skills-row align-items-stretch">
          {skill ? (
            <div
              className="col-lg-5 skills-media-col wow fadeInDown"
              data-wow-duration="0.7s"
              data-wow-delay="0.3s"
            >
              <div className="skills-img">
                <img
                  src={asset(`uploads/img/skill/${skill.skill_image || skill.skill_image_light}`)}
                  alt="Software technology"
                  title="Software technology"
                  className="img-fluid theme-mode-img theme-mode-img--dark"
                />
                <img
                  src={asset(`uploads/img/skill/${skill.skill_image_light || skill.skill_image}`)}
                  alt="Software technology"
                  title="Software technology"
                  className="img-fluid theme-mode-img theme-mode-img--light"
                />
              </div>
            </div>
          ) : null}
          <div
            className="col-lg-7 skills-content-col wow fadeInUp"
            data-wow-duration="0.7s"
            data-wow-delay="0.3s"
          >
            <div className="skills-inner">
              {skill ? (
                <>
                  <h2>{skill.title}</h2>
                  {skill.desc ? <p>{skill.desc}</p> : null}
                </>
              ) : null}
              <div className="row skills-cards">
                {lists.map((skillInfoList) => (
                  <div
                    className="col-md-6 col-sm-6 skills-item-resp"
                    key={skillInfoList.id || skillInfoList.title}
                  >
                    <div className="skills-item">
                      <div className="skills-ring">
                        <svg viewBox="0 0 100 100" aria-hidden="true">
                          <circle
                            className="skills-ring-track"
                            cx="50"
                            cy="50"
                            r="42"
                          />
                          <circle
                            className="skills-ring-value skills-progress-value"
                            cx="50"
                            cy="50"
                            r="42"
                            data-percent={skillInfoList.percent_rate}
                          />
                        </svg>
                        <div className="skills-ring-center">
                          <h2 className="counter">{skillInfoList.percent_rate}</h2>
                        </div>
                      </div>
                      <div className="skills-item-text">
                        <h5>{skillInfoList.title}</h5>
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
