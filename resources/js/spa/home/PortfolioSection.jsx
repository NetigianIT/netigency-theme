import Link from '../components/AppLink';
import { asset } from '../utils/asset';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

function portfolioImageUrl(filename) {
  if (!filename) {
    return asset('uploads/img/dummy/portfolio-demo.png');
  }
  return asset(`uploads/img/portfolio/${filename}`);
}

function portfolioExcerpt(desc, limit = 90) {
  if (!desc) return '';
  const text = String(desc)
    .replace(/<[^>]*>/g, ' ')
    .replace(/\s+/g, ' ')
    .trim();
  if (!text) return '';
  return text.length > limit ? `${text.slice(0, limit).trimEnd()}...` : text;
}

/**
 * Portfolio section — real-data branch.
 */
export default function PortfolioSection({ data = {} }) {
  const {
    section_arr = {},
    portfolio_section,
    portfolio_categories = [],
    portfolios = [],
    translations = {},
  } = data;

  const list = Array.isArray(portfolios) ? portfolios : [];
  if (Number(section_arr.portfolio_section) !== 1) return null;
  if (!portfolio_section && list.length === 0) return null;

  const categories = Array.isArray(portfolio_categories) ? portfolio_categories : [];

  return (
    <section className="section pb-0 bg-primary-light" id="porfolio" data-scroll-index="4">
      <div className="container">
        <div className="row">
          {portfolio_section ? (
            <div className="col-md-6">
              <div className="section-heading-left">
                <span>{portfolio_section.section_title}</span>
                <h2>{portfolio_section.title}</h2>
              </div>
            </div>
          ) : null}
          <div className="col-md-6">
            <div className="portfolio-filter">
              <a href="#" data-portfolio-filter="*" className="current">
                {t(translations, 'all')}
              </a>
              {categories.map((cat) => (
                <a
                  href="#"
                  data-portfolio-filter={`.${cat.portfolio_category_slug}`}
                  key={cat.id || cat.portfolio_category_slug}
                >
                  {cat.category_name}
                </a>
              ))}
            </div>
          </div>
        </div>
        <div className="row portfolio-grid" id="portfolio-masonry-wrap">
          {list.map((portfolio) => {
            const cat = portfolio.portfolio_category || {};
            const slug = cat.portfolio_category_slug || '';
            const imgUrl = portfolioImageUrl(portfolio.thumbnail_image);
            const excerpt = portfolioExcerpt(portfolio.desc);
            return (
              <div
                className={`col-md-6 col-lg-4 portfolio-item ${slug}`}
                key={portfolio.id || portfolio.portfolio_slug}
              >
                <div className="portfolio-item-inner">
                  <div className="portfolio-item-img">
                    <img src={imgUrl} alt="Portfolio image" className="img-fluid" />
                    <a href={imgUrl} className="portfolio-zoom-link">
                      <i className="fas fa-search" />
                    </a>
                  </div>
                  <div className="body">
                    <div className="portfolio-details">
                      <h5>{portfolio.title}</h5>
                      {excerpt ? <p>{excerpt}</p> : null}
                    </div>
                    <Link
                      to={`/portfolio/${portfolio.portfolio_slug}`}
                      className="portfolio-link"
                    >
                      <i className="fa fa-arrow-right" />
                    </Link>
                  </div>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
