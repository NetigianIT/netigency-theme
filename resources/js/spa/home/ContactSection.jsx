import { useMemo } from 'react';
import SectionTitle from '../components/SectionTitle';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

function ContactFormGuard() {
  const startedAt = useMemo(() => Math.floor(Date.now() / 1000), []);

  return (
    <div className="ni-contact-guard" aria-hidden="true">
      <label htmlFor="contactWebsite">Website</label>
      <input
        type="text"
        name="website"
        id="contactWebsite"
        tabIndex={-1}
        autoComplete="off"
        defaultValue=""
      />
      <input type="hidden" name="_form_started_at" defaultValue={startedAt} />
    </div>
  );
}

function resolveCsrf(csrfToken) {
  if (csrfToken) return csrfToken;
  if (typeof document !== 'undefined') {
    const meta = document.querySelector('meta[name="csrf-token"]');
    if (meta?.content) return meta.content;
  }
  return '';
}

/**
 * Contact section — real-data branch + optional map iframe.
 */
export default function ContactSection({ data = {} }) {
  const {
    section_arr = {},
    contact_section,
    contacts = [],
    site_info,
    translations = {},
    csrf_token,
  } = data;

  const list = Array.isArray(contacts) ? contacts : [];
  if (Number(section_arr.contact_section) !== 1) return null;
  if (!contact_section && list.length === 0) return null;

  const csrf = resolveCsrf(csrf_token);

  const contactHasPhone = list.some((item) => {
    const blob = `${item.icon || ''} ${item.title || ''} ${item.desc || ''}`.toLowerCase();
    return (
      blob.includes('phone') || blob.includes('whatsapp') || blob.includes('fa-phone')
    );
  });

  const phoneText = site_info?.phone || '+880 1700-000000';
  const phoneDigits = String(site_info?.phone || '').replace(/[^0-9]/g, '');

  return (
    <>
      <section className="section contact-section" id="contact" data-scroll-index="7">
        <div className="container">
          {contact_section ? (
            <SectionTitle
              title={contact_section.title}
              subtitle={contact_section.section_title}
              align="center"
              colClass="col-lg-7"
              dots
            />
          ) : null}
          <div className="row contact-layout align-items-start">
            <div className="col-lg-5">
              <div className="contact-info-list">
                {list.map((contact) => (
                  <div className="contact-info-item" key={contact.id || contact.title}>
                    {contact.icon ? (
                      <div className="icon">
                        <span className={contact.icon} />
                      </div>
                    ) : null}
                    <div className="body">
                      {contact.title ? <h5>{contact.title}</h5> : null}
                      {contact.desc ? <p>{contact.desc}</p> : null}
                    </div>
                  </div>
                ))}
                {!contactHasPhone ? (
                  <div className="contact-info-item">
                    <div className="icon">
                      <span className="fa fa-phone" />
                    </div>
                    <div className="body">
                      <h5>{t(translations, 'phone')}</h5>
                      <p>
                        {site_info?.phone ? (
                          <a
                            href={`https://wa.me/${phoneDigits}`}
                            target="_blank"
                            rel="noopener noreferrer"
                          >
                            {phoneText}
                          </a>
                        ) : (
                          phoneText
                        )}
                      </p>
                    </div>
                  </div>
                ) : null}
              </div>
            </div>
            <div className="col-lg-7">
              <div className="contact-form-card">
                <div className="contact-form-wrap">
                  <form
                    className="js-contact-form"
                    action="/message"
                    method="POST"
                    noValidate
                  >
                    <input type="hidden" name="_token" value={csrf} />
                    <ContactFormGuard />
                    <div className="row">
                      <div className="col-md-6">
                        <div className="contact-form-group">
                          <input
                            type="text"
                            className="form-control"
                            name="name"
                            placeholder={t(translations, 'name')}
                            required
                          />
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="contact-form-group">
                          <input
                            type="email"
                            className="form-control"
                            name="email"
                            placeholder={t(translations, 'email')}
                            required
                          />
                        </div>
                      </div>
                      <div className="col-md-12">
                        <div className="contact-form-group">
                          <input
                            type="text"
                            className="form-control"
                            name="subject"
                            placeholder={t(translations, 'subject')}
                            required
                          />
                        </div>
                      </div>
                      <div className="col-md-12">
                        <div className="contact-form-group">
                          <textarea
                            name="message"
                            className="form-control"
                            cols={20}
                            rows={6}
                            placeholder="Your Message"
                            required
                          />
                        </div>
                      </div>
                      <div className="col-md-12">
                        <div className="contact-btn-left">
                          <button type="submit" className="primary-btn">
                            <span className="text">{t(translations, 'send_message')}</span>
                            <span className="icon">
                              <i className="fa fa-arrow-right" />
                            </span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {contact_section?.map_iframe ? (
        <div className="google-map">
          <iframe
            src={contact_section.map_iframe}
            allowFullScreen=""
            aria-hidden="false"
            tabIndex={0}
            title="Google Map"
          />
        </div>
      ) : null}
    </>
  );
}
