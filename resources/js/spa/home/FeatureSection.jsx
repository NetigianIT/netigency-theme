import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';

const TECH_LOGOS = {
  laravel: 'laravel.svg',
  'vue.js': 'vuejs.svg',
  vuejs: 'vuejs.svg',
  php: 'php.svg',
  'node.js': 'nodejs.svg',
  nodejs: 'nodejs.svg',
  mysql: 'mysql.svg',
  'react.js': 'react.svg',
  react: 'react.svg',
  redis: 'redis.svg',
  livewire: 'livewire.svg',
  'ci/cd': 'cicd.svg',
  cicd: 'cicd.svg',
  deploy: 'deploy.svg',
  cursor: 'cursor.svg',
  primevue: 'primevue.svg',
  primereact: 'primereact.svg',
  reactvue: 'primereact.svg',
  'nuxt.js': 'nuxt.svg',
  nuxt: 'nuxt.svg',
  'next.js': 'nextjs.svg',
  nextjs: 'nextjs.svg',
  next: 'nextjs.svg',
  zustand: 'zustand.svg',
  redux: 'redux.svg',
  vuex: 'vuex.svg',
  pinia: 'pinia.svg',
  typescript: 'typescript.svg',
  ts: 'typescript.svg',
};

const TECH_OFFICIAL_URLS = {
  laravel: 'https://laravel.com',
  'vue.js': 'https://vuejs.org',
  vuejs: 'https://vuejs.org',
  php: 'https://www.php.net',
  'node.js': 'https://nodejs.org',
  nodejs: 'https://nodejs.org',
  mysql: 'https://www.mysql.com',
  'react.js': 'https://react.dev',
  react: 'https://react.dev',
  'nuxt.js': 'https://nuxt.com',
  nuxt: 'https://nuxt.com',
  vuex: 'https://vuex.vuejs.org',
  typescript: 'https://www.typescriptlang.org',
  ts: 'https://www.typescriptlang.org',
  redis: 'https://redis.io',
  deploy: 'https://www.docker.com',
  cursor: 'https://cursor.com',
  primevue: 'https://primevue.org',
  primereact: 'https://primereact.org',
  'next.js': 'https://nextjs.org',
  nextjs: 'https://nextjs.org',
  next: 'https://nextjs.org',
  zustand: 'https://zustand.docs.pmnd.rs',
  redux: 'https://redux.js.org',
  pinia: 'https://pinia.vuejs.org',
  livewire: 'https://livewire.laravel.com',
};

function techLogoFile(title) {
  return TECH_LOGOS[String(title || '').toLowerCase().trim()] ?? null;
}

function logoSlug(title) {
  return String(title || '')
    .toLowerCase()
    .trim()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/^-+|-+$/g, '');
}

/** Mirrors x-frontend.tech-icon */
function TechIcon({ title = '', type = 'icon', icon = null, featureImage = null, size = 'main' }) {
  const logoFile = techLogoFile(title);
  const sizeClass = size === 'sub' ? 'tech-icon-wrap--sub' : 'tech-icon-wrap--main';
  const slug = logoSlug(title);

  return (
    <div className={`tech-icon-wrap ${sizeClass}`}>
      {type === 'icon' && logoFile ? (
        <img
          src={asset(`assets/frontend/img/tech/${logoFile}`)}
          alt={title}
          className={`tech-logo tech-logo--${slug}`}
          loading="lazy"
          decoding="async"
        />
      ) : type === 'icon' && icon ? (
        <div className="tech-fa-icon" aria-hidden="true">
          <span className={icon} />
        </div>
      ) : type !== 'icon' && featureImage ? (
        <img
          src={asset(`uploads/img/features/${featureImage}`)}
          alt={title}
          className={`tech-logo tech-logo--${slug}`}
          loading="lazy"
          decoding="async"
        />
      ) : null}
    </div>
  );
}

/**
 * Resume / features (tech stack) — real-data branch.
 */
export default function FeatureSection({ data = {} }) {
  const {
    section_arr = {},
    feature_section,
    features = [],
    main_features,
    sub_features = [],
  } = data;

  const featureList = Array.isArray(features) ? features : [];
  const hasData = !!feature_section || featureList.length > 0;
  if (Number(section_arr.feature_section) !== 1 || !hasData) return null;

  const base = Array.isArray(main_features) && main_features.length > 0
    ? main_features
    : featureList;
  const extras = Array.isArray(sub_features) ? sub_features : [];

  const techItems = [...base, ...extras].filter((feature) => {
    const title = String(feature?.title || '')
      .toLowerCase()
      .trim();
    return !['ci/cd', 'cicd', 'ci-cd'].includes(title);
  });

  return (
    <section className="section pb-minus-76 bg-primary-light" id="myresume">
      <div className="container">
        {feature_section ? (
          <SectionTitle
            title={feature_section.title}
            subtitle={feature_section.section_title}
            dots
          />
        ) : null}
        <div className="row tech-grid tech-grid--main">
          {techItems.map((feature, index) => {
            const techKey = String(feature.title || '')
              .toLowerCase()
              .trim();
            const techUrl = TECH_OFFICIAL_URLS[techKey] ?? null;
            const hasTooltip = !!feature.desc;
            const itemClass = `tech-item tech-item--main${hasTooltip ? ' has-tooltip' : ''}`;
            const delay = Math.min(index, 5);
            const icon = (
              <>
                <TechIcon
                  title={feature.title}
                  type={feature.type}
                  icon={feature.icon}
                  featureImage={feature.feature_image}
                  size="main"
                />
                <h5>{feature.title}</h5>
                {hasTooltip ? (
                  <span className="tech-tooltip" role="tooltip">
                    {feature.desc}
                  </span>
                ) : null}
              </>
            );

            return (
              <div
                className="col-6 col-sm-4 col-lg-2 wow fadeInDown"
                data-wow-duration="0.5s"
                data-wow-delay={`0.${delay}s`}
                key={feature.id || feature.title || index}
              >
                {techUrl ? (
                  <a
                    className={itemClass}
                    href={techUrl}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={`${feature.title} official website`}
                  >
                    {icon}
                  </a>
                ) : (
                  <div className={itemClass}>{icon}</div>
                )}
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
