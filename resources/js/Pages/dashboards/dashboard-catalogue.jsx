import { useEffect, useState } from "react";

export default function CourseCatalogue({ courses = [], isListing, appUrl }) {

    const [query, setQuery] = useState('');
    const [updatedCourses, setUpdatedModels] = useState(courses);

    useEffect(() => {
        if (query !== '') {
            const filteredCourses = courses.data.filter((course) => {
                return course.name.toLowerCase().includes(query.toLowerCase());
            });

            setUpdatedModels({ ...courses, data: filteredCourses });
        } else {
            setUpdatedModels(courses);
        }
    }, [query, courses]);

    return (
        <>
            <h1>Course Catalogue</h1>
            <h6 className='text-justify'>
                Welcome to the course catalogue. You can browse through the available courses and subjects.
            </h6>

            <div className="mb-2">
                {/* <h3 className="card-title">Courses</h3> */}
            </div>

            {
                !isListing ? (
                    <>
                        {updatedCourses.current_page !== 1 && (
                            <a className='btn btn-primary' href={updatedCourses.prev_page_url}>{"<"}</a>
                        )}
                        {updatedCourses.current_page !== updatedCourses.last_page && (
                            <a className='btn btn-primary' href={updatedCourses.next_page_url}>{">"}</a>
                        )}
                    </>
                ) : (
                    <>
                        <div className="p-2 row">
                            <input type="text" className="col-10" onChange={
                                (event) => {
                                    setQuery(event.target.value);
                                }
                            } />
                            <div className="col-2">
                                <button children={'search'} className="btn btn-block btn-primary w-100" />
                            </div>
                        </div>
                    </>
                )
            }

            <div className="row justify-content-start gy-2 gx-3">

                {
                    updatedCourses.data.map((course, index) => (
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
                                {
                                    course.image ? (
                                        <>
                                            {/* {appUrl + '/' +  course.image} */}
                                            <img src={appUrl + '/' +  course.image} className="p-2" alt="" />
                                        </>
                                    ) : (
                                        <img src="https://via.placeholder.com/1080x500" className="p-2" alt="" />
                                    )
                                }
                                <div className="card-body" style={
                                    {
                                        position: "relative",
                                        height: "120%"
                                    }
                                }>
                                    <h6 className="card-title">{course.name}</h6>
                                    <p className="card-text">{course.description}</p>
                                    <br />
                                    {
                                        !isListing ? (
                                            <>
                                                <a href={`store/buy/course/` + course.id} className="btn btn-primary mt-4" style={
                                                    {
                                                        position: "absolute",
                                                        bottom: "10px",
                                                        left: "10px",
                                                    }
                                                }>Buy</a>
                                            </>
                                        ) : (
                                            <>

                                                {
                                                    course.isOwned ? (
                                                        <a href={route('student-show-course', {'id' : course.id})} className="btn btn-success mt-4" style={
                                                            {
                                                                position: "absolute",
                                                                bottom: "10px",
                                                                left: "10px",
                                                            }
                                                        }>Owned</a>
                                                    ) : (
                                                        <>
                                                            <a href={route('store-show-course', {'id' : course.id})} className="btn btn-primary mt-4" style={
                                                                {
                                                                    position: "absolute",
                                                                    bottom: "10px",
                                                                    left: "10px",
                                                                }
                                                            }>Buy</a>
                                                        </>
                                                    )
                                                }
                                            </>
                                        )
                                    }
                                </div>
                            </div>
                        </div>
                    ))
                }
            </div>
        </>
    );
}