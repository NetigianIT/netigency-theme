import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';

function StarRating({ star = 0 }) {
  const filled = Math.max(0, Math.min(5, Number(star) || 0));
  return (
    <div className="rating">
      {Array.from({ length: 5 }, (_, i) => (
        <i key={i} className={i < filled ? 'fa fa-star' : 'far fa-star'} />
      ))}
    </div>
  );
}

/**
 * Testimonial section — real-data branch.
 * Note: Blade star loop is buggy; this renders star filled + (5-star) empty icons.
 */
export default function TestimonialSection({ data = {} }) {
  const { section_arr = {}, testimonial_section, testimonials = [] } = data;

  const list = Array.isArray(testimonials) ? testimonials : [];
  // Blade uses client_section for visibility
  if (Number(section_arr.client_section) !== 1) return null;
  if (!testimonial_section && list.length === 0) return null;

  return (
    <section className="section pb-minus-76 bg-primary-light">
      <div className="container">
        {testimonial_section ? (
          <SectionTitle
            title={testimonial_section.title}
            subtitle={testimonial_section.section_title}
            colClass="col-md-6"
          />
        ) : null}
        <div className="owl-carousel owl-theme" id="testimonialCarousel">
          {list.map((testimonial) => (
            <div className="item" key={testimonial.id || testimonial.name}>
              <div className="testimonial-item">
                {Number(testimonial.image_status) === 1 && testimonial.testimonial_image ? (
                  <div className="img">
                    <img
                      src={asset(
                        `uploads/img/testimonials/${testimonial.testimonial_image}`
                      )}
                      alt="Testimonial image"
                      className="img-fluid"
                    />
                  </div>
                ) : null}
                <div className="body">
                  <h5>{testimonial.name}</h5>
                  <span>{testimonial.job}</span>
                  <p>{testimonial.desc}</p>
                  <StarRating star={testimonial.star} />
                </div>
                <span className="quote-icon">
                  <i className="fas fa-quote-right" />
                </span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
