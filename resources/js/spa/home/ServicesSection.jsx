import Link from '../components/AppLink';
import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

/** Mirrors x-frontend.service-card-icon */
function ServiceCardIcon({ title = '', icon = null, image = null, useImage = false }) {
  if (!((useImage && image) || icon)) return null;

  return (
    <div className="services-item-icon-wrap">
      {useImage && image ? (
        <img
          src={asset(`uploads/img/service/${image}`)}
          alt={title}
          className="services-logo"
          loading="lazy"
          decoding="async"
        />
      ) : icon ? (
        <span className={icon} aria-hidden="true" />
      ) : null}
    </div>
  );
}

/**
 * Services section — real-data branch.
 */
export default function ServicesSection({ data = {} }) {
  const {
    section_arr = {},
    service_section,
    services = [],
    translations = {},
  } = data;

  const list = Array.isArray(services) ? services : [];
  if (Number(section_arr.service_section) !== 1) return null;
  if (!service_section && list.length === 0) return null;

  return (
    <section className="section pb-minus-70" id="services" data-scroll-index="3">
      <div className="container">
        {service_section ? (
          <SectionTitle
            title={service_section.title}
            subtitle={service_section.section_title}
            align="center"
            dots
          />
        ) : null}
        <div className="row services-grid">
          {list.map((service, index) => (
            <div
              className="col-lg-4 col-md-6 wow fadeInLeft"
              data-wow-duration="0.5s"
              data-wow-delay={`0.${index}s`}
              key={service.id || service.service_slug || index}
            >
              <div className="services-item">
                <div className="services-item-media">
                  <ServiceCardIcon
                    title={service.title}
                    icon={service.icon}
                    image={service.service_image}
                    useImage={service.image_status === 'enable'}
                  />
                </div>
                <div className="body">
                  <h5>{service.title}</h5>
                  {service.short_desc ? <p>{service.short_desc}</p> : null}
                  <Link to={`/service/${service.service_slug}`}>
                    {t(translations, 'read_more')} <i className="fa fa-arrow-right" />
                  </Link>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
