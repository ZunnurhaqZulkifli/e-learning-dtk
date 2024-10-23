export default function UserCourse({ course }) {
 return (
    <>
        <div>
            <h2>Kursus Anda</h2>
            <div className="row">
                {course.map((course) => (
                    <div className="col-md-4" key={course.id}>
                        <div className="card">
                            {/* <img src={course.image} className="card-img-top" alt={course.title} /> */}
                            <div className="card-body">
                                <h5 className="card-title">{course.name}</h5>
                                <p className="card-text">{course.description}</p>
                                {/* <a href={route('courses.show', course.slug)} className="btn btn-primary">Lihat Kursus</a> */}
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    </>
 ); 
}