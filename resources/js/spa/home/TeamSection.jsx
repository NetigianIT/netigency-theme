import SectionTitle from '../components/SectionTitle';
import { asset } from '../utils/asset';

/**
 * Team section — real-data branch.
 */
export default function TeamSection({ data = {} }) {
  const { section_arr = {}, team_section, teams = [] } = data;

  const list = Array.isArray(teams) ? teams : [];
  if (Number(section_arr.team_section) !== 1) return null;
  if (!team_section && list.length === 0) return null;

  return (
    <section className="section" id="team">
      <div className="container">
        {team_section ? (
          <SectionTitle
            title={team_section.title}
            subtitle={team_section.section_title}
            align="center"
            dots
          />
        ) : null}
        <div className="row">
          {list.map((team, index) => (
            <div
              className="col-md-6 col-lg-4 wow fadeInDown"
              data-wow-duration="0.7s"
              data-wow-delay={`0.${index + 1}s`}
              key={team.id || team.name || index}
            >
              <div className="team-card">
                {team.team_image ? (
                  <div className="img">
                    <img
                      src={asset(`uploads/img/teams/${team.team_image}`)}
                      alt="Team image"
                    />
                  </div>
                ) : null}
                <div className="body">
                  <div className="text">
                    {team.name ? <h5>{team.name}</h5> : null}
                    {team.job ? <p>{team.job}</p> : null}
                  </div>
                  <div className="social">
                    <ul>
                      {team.link_2 ? (
                        <li>
                          <a href={team.link_2}>
                            <i className="fab fa-facebook-f" />
                          </a>
                        </li>
                      ) : null}
                      {team.link_3 ? (
                        <li>
                          <a href={team.link_3}>
                            <i className="fab fa-twitter" />
                          </a>
                        </li>
                      ) : null}
                      {team.link_4 ? (
                        <li>
                          <a href={team.link_4}>
                            <i className="fab fa-instagram" />
                          </a>
                        </li>
                      ) : null}
                      {team.link_5 ? (
                        <li>
                          <a href={team.link_5}>
                            <i className="fab fa-linkedin" />
                          </a>
                        </li>
                      ) : null}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
