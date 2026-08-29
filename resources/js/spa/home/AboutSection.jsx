import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';
import { chunk } from '../utils/chunk';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

/**
 * About section — real-data (isset about) branch.
 */
export default function AboutSection({ data = {} }) {
  const { section_arr = {}, about, info_lists = [], translations = {} } = data;

  if (Number(section_arr.about_us_section) !== 1 || !about) return null;

  const lists = Array.isArray(info_lists) ? info_lists : [];
  const half = Math.max(1, Math.ceil(lists.length / 2));
  const columns = chunk(lists, half);

  return (
    <section className="section about-section" id="about" data-scroll-index="2">
      <div className="container">
        <SectionTitle
          title={t(translations, 'about_us')}
          colClass="col-12"
          headingClass="about-section-heading"
          dots
        />
        <div className="row about-row align-items-stretch">
          <div className="col-lg-6 about-media-col">
            <div className="about-img">
              <img
                src={asset(`uploads/img/about/${about.about_image || about.about_image_light}`)}
                alt="About image"
                title="About image"
                className="img-fluid theme-mode-img theme-mode-img--dark"
              />
              <img
                src={asset(`uploads/img/about/${about.about_image_light || about.about_image}`)}
                alt="About image"
                title="About image"
                className="img-fluid theme-mode-img theme-mode-img--light"
              />
              {about.video_link ? (
                <a
                  className="about-video-btn"
                  href={about.video_link}
                  aria-label="Play demo video"
                >
                  <span className="about-video-btn__pulse" aria-hidden="true" />
                  <span
                    className="about-video-btn__pulse about-video-btn__pulse--delay"
                    aria-hidden="true"
                  />
                  <span className="about-video-btn__ring" aria-hidden="true" />
                  <span className="about-video-btn__core" aria-hidden="true">
                    <span className="about-video-btn__icon" />
                  </span>
                </a>
              ) : null}
            </div>
          </div>
          <div className="col-lg-6 about-content-col">
            <div
              className="about-inner wow fadeInUp"
              data-wow-duration="0.5s"
              data-wow-delay="0.1s"
            >
              <h2>{about.title}</h2>
              <p>{about.desc}</p>
              <div className="row about-info-grid">
                {columns.map((infoList, colIdx) => (
                  <div className="col-6" key={colIdx}>
                    <ul className={colIdx === 0 ? 'mb-resp-15' : undefined}>
                      {infoList.map((item) => (
                        <li className="about-info-item" key={item.id || item.title}>
                          <div className="text">
                            <h5>{item.title}</h5>
                            <p>{item.desc}</p>
                          </div>
                        </li>
                      ))}
                    </ul>
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
