export default function CourseCatalogue({ courses }) {
    return (
        <>
        <h1>Course Catalogue</h1>
        <h6 className='text-justify'>
          Welcome to the course catalogue. Here, you can browse through the available courses and subjects.
        </h6>

        <div className="mb-2">
          <h3 className="card-title">Courses</h3>
        </div>

        {(courses.current_page != 1) ? <a className='btn btn-primary' href={courses.prev_page_url}>{ "<" }</a> : <a></a>}
        {(courses.current_page != 4) ? <a className='btn btn-primary' href={courses.next_page_url}>{ ">" }</a> : <a></a>}

          <div className="row justify-content-start gy-2 gx-3">
              {
                courses.data.map((course, index) => (
                    <div className="col-6" key={index}>
                        <div className="card mt-2 h-100" style={
                            {
                                borderRadius: "0px",
                                borderColor: "grey",
                                borderWidth: "1px",
                                cursor: "pointer",
                                backdropFilter: "blur(10px)",
                                backgroundColor: "rgba(255, 255, 255, 0.05)",
                            }
                        }
                        >
                            <img src="https://via.placeholder.com/1080x500" className="p-2" alt="" />
                            <div className="card-body" style={
                                {
                                    position: "relative",
                                    height: "120%"
                                }
                            }>
                                <h6 className="card-title">{course.name}</h6>
                                <p className="card-text">{course.description}</p>
                                <br/>
                                <a href={`course/` + course.id} className="btn btn-primary mt-4" style={
                                    {
                                        position: "absolute",
                                        bottom: "10px",
                                        left: "10px",
                                    }
                                }>View</a>
                            </div>
                        </div>
                    </div>
                ))
              }
            </div>
        </>
    );
}