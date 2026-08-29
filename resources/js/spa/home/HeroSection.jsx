import { useEffect, useState } from 'react';
import { asset } from '../utils/asset';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

function collectAnimatedTitles(fixedContent) {
  return [
    fixedContent.animated_title_1,
    fixedContent.animated_title_2,
    fixedContent.animated_title_3,
    fixedContent.animated_title_4,
  ].filter((word) => typeof word === 'string' && word.trim() !== '');
}

function HeroTypedText({ words }) {
  const wordsKey = words.join('\u0001');
  const [text, setText] = useState(words[0] || '');

  useEffect(() => {
    const list = wordsKey ? wordsKey.split('\u0001').filter(Boolean) : [];
    if (!list.length) return undefined;

    let wordIndex = 0;
    let charIndex = list[0].length;
    let deleting = true;
    let timer;

    const typeSpeed = 90;
    const deleteSpeed = 45;
    const holdDelay = 1600;
    const gapDelay = 350;

    const tick = () => {
      const current = list[wordIndex] || '';

      if (!deleting && charIndex === current.length) {
        timer = window.setTimeout(() => {
          deleting = true;
          tick();
        }, holdDelay);
        return;
      }

      if (deleting && charIndex === 0) {
        deleting = false;
        wordIndex = (wordIndex + 1) % list.length;
        timer = window.setTimeout(tick, gapDelay);
        return;
      }

      charIndex += deleting ? -1 : 1;
      setText((list[wordIndex] || '').slice(0, charIndex));
      timer = window.setTimeout(tick, deleting ? deleteSpeed : typeSpeed);
    };

    setText(list[0]);
    timer = window.setTimeout(tick, holdDelay);

    return () => window.clearTimeout(timer);
  }, [wordsKey]);

  if (!words.length) return null;

  return (
    <span className="hero-typed">
      <span className="hero-typed__text">{text}</span>
      <span className="hero-typed__cursor" aria-hidden="true" />
    </span>
  );
}

/**
 * Hero section — real-data (@isset fixed_content) branch.
 */
export default function HeroSection({ data = {} }) {
  const { fixed_content, socials = [], translations = {} } = data;

  if (!fixed_content) return null;

  const heroParticlesEnabled = Number(fixed_content.particles_status ?? 1) === 1;
  const darkImage = fixed_content.thumbnail_image || fixed_content.thumbnail_image_light;
  const lightImage = fixed_content.thumbnail_image_light || fixed_content.thumbnail_image;
  const showImage = Number(fixed_content.image_status) === 1 && !!darkImage;
  const animatedTitles = collectAnimatedTitles(fixed_content);

  return (
    <section className="hero-banner" id="hero-particles-effect" data-scroll-index="1">
      {heroParticlesEnabled ? <div id="heroparticles" /> : null}
      <div className="container">
        <div className="row align-items-center">
          <div className="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
            <div className="hero-inner">
              <h1>
                <span className="hero-title-static">{fixed_content.title}</span>
                {animatedTitles.length ? <>{' '}<HeroTypedText words={animatedTitles} /></> : null}
              </h1>
              <h2>{fixed_content.desc}</h2>
              {fixed_content.btn_name ? (
                <a href="#porfolio" data-scroll-nav="4" className="white-btn">
                  <span className="text">{fixed_content.btn_name}</span>
                  <span className="icon">
                    <i className="fa fa-arrow-right" />
                  </span>
                </a>
              ) : null}
            </div>
          </div>
          {showImage ? (
            <div
              className="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
              data-wow-duration="0.7s"
              data-wow-delay="0.5s"
            >
              <div className="hero-img">
                <div className="border-line-outer">
                  <div className="border-line-inner">
                    <img
                      src={asset(`uploads/img/general/${darkImage}`)}
                      alt="image"
                      className="img-fluid theme-mode-img theme-mode-img--dark"
                    />
                    <img
                      src={asset(`uploads/img/general/${lightImage}`)}
                      alt="image"
                      className="img-fluid theme-mode-img theme-mode-img--light"
                    />
                  </div>
                </div>
              </div>
            </div>
          ) : null}
        </div>
      </div>
      {(socials || []).length > 0 ? (
        <ul className="hero-social-list">
          {socials.map((social) => (
            <li key={social.id || social.social_media}>
              <a href={social.link || '#'}>
                <i className={social.social_media} />
              </a>
            </li>
          ))}
        </ul>
      ) : null}
      <a href="#" data-scroll-nav="2" className="scroll-down-btn">
        {t(translations, 'scroll_down')}
      </a>
    </section>
  );
}
