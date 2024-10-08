export default function CoursesLists({ courses }) {
    return (
        <>
            <div>
                <div className="row">
                    {courses.map((course) => (
                        <div className="col-md-4" key={course.id}>
                            <div className="card">
                                <img src={course.image} className="card-img-top" alt={course.title} />
                                <div className="card-body">
                                    <h5 className="card-title">{course.name}</h5>
                                    <p className="card-text">{course.description}</p>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </>
    );
}