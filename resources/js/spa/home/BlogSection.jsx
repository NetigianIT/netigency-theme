import Link from '../components/AppLink';
import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';

function t(translations, key) {
  if (!translations) return key;
  return translations[`frontend.${key}`] ?? translations[key] ?? key;
}

/**
 * Blog section — real-data branch.
 */
export default function BlogSection({ data = {} }) {
  const {
    section_arr = {},
    blog_section,
    recent_posts = [],
    translations = {},
  } = data;

  const list = Array.isArray(recent_posts) ? recent_posts : [];
  if (Number(section_arr.blog_section) !== 1) return null;
  if (!blog_section && list.length === 0) return null;

  return (
    <section className="section pb-minus-76" id="blog" data-scroll-index="6">
      <div className="container">
        {blog_section ? (
          <SectionTitle
            title={blog_section.title}
            subtitle={blog_section.section_title}
            colClass="col-md-6"
            navSlotId="blogCarouselNav"
          />
        ) : null}
        <div className="owl-carousel owl-theme" id="blogCarousel">
          {list.map((recentPost) => {
            const authorLabel =
              recentPost.type === 'with_this_account'
                ? recentPost.author_name
                : t(translations, 'anonymous');
            const imgSrc = recentPost.blog_image
              ? asset(`uploads/img/blogs/${recentPost.blog_image}`)
              : asset('uploads/img/dummy/no-image.jpg');
            const postPath = `/blog/${recentPost.slug}`;

            return (
              <div className="item" key={recentPost.id || recentPost.slug}>
                <div className="blog-item">
                  <div className="blog-img">
                    <Link to={postPath}>
                      <img src={imgSrc} alt="Blog image" className="img-fluid" />
                    </Link>
                  </div>
                  <div className="blog-body">
                    <div className="blog-meta">
                      <a href="#">
                        <span>
                          <i className="far fa-user" />
                          {authorLabel}
                        </span>
                      </a>
                      <a href="#">
                        <span>
                          <i className="far fa-bookmark" />
                          {recentPost.category_name}
                        </span>
                      </a>
                    </div>
                    <h5>
                      <Link to={postPath}>{recentPost.title}</Link>
                    </h5>
                    {recentPost.short_desc ? <p>{recentPost.short_desc}</p> : null}
                    <Link to={postPath} className="blog-link">
                      {t(translations, 'read_more')}
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
