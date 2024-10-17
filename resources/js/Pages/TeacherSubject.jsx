import ReactPlayer from "react-player";
import StatusBadge from "./Components/StatusBadge";
import SubjectList from "./Components/SubjectList";
import MasterLayout from "./MasterLayout";
import AssingmentTeacher from "./TeacherAssignment";

export default function SubjectTeacher({model}) {
    return (
        <>
        <MasterLayout>
            <div className="row">
                <div className="col-4">
                    <div className="">
                        <h3 className="card-title">Subject</h3>
                    </div>
                    <div className="card">
                        <div className="card-header">
                            <a className="card-title">{model.name}</a>
                        </div>
                        <div className="card-body">
                            <a className="card-title">{model.description}</a>
                            <h6 className="card-title">
                                <StatusBadge status={model.status}/>
                            </h6>
                            <h6 className="card-title">{model.students.length}</h6>
                            {/* <h6 className="card-title">{model.teacher.name}</h6> */}
                        </div>
                    </div>
                </div>

                <div className="col-4">
                    <div className="">
                        <h3 className="card-title">Lecturer</h3>
                    </div>
                    <div className="card">
                        <div className="card-header">
                            <a className="card-title">{model.teacher.name}</a>
                        </div>
                        <div className="card-body">
                            <a className="card-title">{model.teacher.code}</a>
                            <h6 className="card-title">{model.teacher.created_at}</h6>
                            <h6 className="card-title">{model.teacher.email ?? 'teacher@example.com'}</h6>
                            {/* <h6 className="card-title">{model.teacher.name}</h6> */}
                        </div>
                    </div>
                </div>

                <div className="col-4">
                    <div className="">
                        <h3 className="card-title">Student</h3>
                    </div>
                    <div className="card">
                        <div className="card-header">
                            <a className="card-title">Total Enrolled : {model.students.length}</a>
                        </div>
                        <div className="card-body">
                            {
                                model.students.length === 0 ? <h6 className="card-title">No student enrolled</h6> :
                                model.students.map((student) => {
                                    return (
                                        <div key={student.id}>
                                            <a className="card-title">{student.name}</a>
                                        </div>
                                )})
                            }
                            <a href="#" className="text-left btn btn-sm btn-primary">
                                View all students
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div className="row mt-4">
                    <div className="col-8">
                        <div className="mb-2">
                            <h3 className="card-title">{model.name}</h3>
                        </div>
                        <div className="card bg-orange-50 bg-opacity-10" style={
                                {
                                    height: "100%",
                                    width: "100%",
                                }
                            }>

                        <div className="p-3">
                            <ReactPlayer 
                                // url={model.video_path}
                                url={model.video_path}
                                controls={
                                    true
                                }
                                width="100%"
                                height="600px"
                            />
                        </div>

                        <div className="card-body">
                            <h6 className="card-title">{model.description}</h6>
                            <a href={`/teacher/assignment/1`} className="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <div className="col-4">
                    <div className="mb-2">
                        <h3 className="card-title">Assignment</h3>
                    </div>
                    <SubjectList model={model} />
                </div>
            </div>
            </MasterLayout>
        </>
    );
}