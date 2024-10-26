import MasterLayout from "../master-layout";
import CoursesCatalogue from '../dashboards/dashboard-catalogue';

export default function StoreFrontPage({ course }) {
    return (
        <MasterLayout>
            <h3 className="">{course.name}</h3>
            <img src="https://via.placeholder.com/1200x600" className="p-2" alt="" />
            <p className="">{course.description}</p>
            <p className="">{course.created_at}</p>
            {/* {JSON.stringify(course)} */}

            <h4>Subjects</h4>
            <div className="card">
                {
                    course.subjects.map((subject) => {
                        return (
                            <div className="card-body" key={subject.id}>
                                <h5 className="card-title">{subject.name}</h5>
                                <p className="card-text">{subject.description}</p>
                                {/* <a href={`/store/subject/${subject.id}`} className="btn btn-primary">
                                    <i className="bi bi-arrow-right"></i>
                                </a> */}
                            </div>
                        );
                    })
                }
            </div>

            <a href={ route('store-purchase-course', {'id' : course.id})} className="btn btn-primary">
                <i className="bi bi-cart-check"></i>
            </a>
        </MasterLayout>
    );
}