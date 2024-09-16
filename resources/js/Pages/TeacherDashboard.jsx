import TimeTableCard from "./Components/TimeTableCard";
import MasterLayout from "./MasterLayout";

export default function DashboardTeacher({model}) {
    return (
        <>
            <MasterLayout>
                <h1>Teacher Dashboard</h1>
                <h6 className='text-justify'>
                    Welcome to the teacher dashboard. Here, you can manage your courses, students, and other related information.
                </h6>

                {/* <div className="">
                    <h3 className="card-title">Courses</h3>
                </div> */}

                <div className="row">
                    <div className="col-8">
                        {model.courses.map((course) => {
                            return (
                                <div className="card mb-4"  key={course.id}>
                                    <div className="card-body" >
                                        <div className="row">
                                            <div className="col-10">
                                                <h4 className="">{course.name}</h4>
                                                <p className="card-text">{course.description}</p>
                                            </div>
                                            <div className="col-2 d-flex justify-content-end">
                                                <a href={`/teacher/course/${course.id}`}>
                                                    <i className="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div className="row justify-content-start">
                                            {
                                                course.subjects.map((subject) => {
                                                    return (
                                                        <div className="col-3 ml-2 card mt-2 bg-orange-50 bg-opacity-10" style={
                                                            {
                                                                width: "16rem",
                                                                cursor: "pointer",
                                                                borderRadius: "0px"
                                                            }
                                                        }
                                                        key={subject.id}
                                                        >
                                                        <img src="https://via.placeholder.com/100x100" className="p-2 mt-2" alt=""/>
                                                            <div className="card-body">
                                                                <h6 className="card-title">{subject.name}</h6>
                                                                <p className="card-text">{subject.description}</p>
                                                                <a href={`/teacher/subject/${subject.id}`} className="btn btn-primary">View</a>
                                                            </div>
                                                        </div>
                                                    );
                                                })
                                            }
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                    <div className="col-4">
                        <TimeTableCard/>
                        <div className="card">
                            <div className="card-body">
                                <h5 className="card-title">Create New Course</h5>
                                <form action="/teacher/course" method="post">
                                    <div className="mb-3">
                                        <label htmlFor="name" className="form-label">Name</label>
                                        <input type="text" className="form-control" id="name" name="name" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="description" className="form-label">Description</label>
                                        <textarea className="form-control" id="description" name="description"></textarea>
                                    </div>
                                    <button type="submit" className="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </MasterLayout>
        </>
    );
}
