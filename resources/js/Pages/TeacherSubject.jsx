import MasterLayout from "./MasterLayout";

export default function SubjectTeacher({model}) {
    return (
        <>
        <MasterLayout>
            <div className="">
                <h3 className="card-title">Subject</h3>
            </div>

            <div className="card">

                <div className="card-header">
                    <a className="card-title">{model.name}</a>
                </div>
                <div className="card-body">
                    <a className="card-title">{model.description}</a>
                    <h6 className="card-title">{model.status}</h6>
                    <h6 className="card-title">{model.students.length}</h6>
                    {/* <h6 className="card-title">{model.teacher.name}</h6> */}
                </div>
            </div>

            {
                model.assignments.map((assignment) => {
                    return (
                        <div className="card mt-2 bg-orange-50 bg-opacity-10" style={
                            {
                                height: "21rem",
                                cursor: "pointer",
                                borderRadius: "0px"
                            }
                        }
                        key={assignment.id}
                        >
                        <img src="https://via.placeholder.com/1920x200" className="p-3" alt=""/>
                            <div className="card-body">
                                <h6 className="card-title">{assignment.name}</h6>
                                <p className="card-text">{assignment.description}</p>
                                <a href={`/teacher/subject/${assignment.id}`} className="btn btn-primary">View</a>
                            </div>
                        </div>
                    );
                })
            }
        </MasterLayout>
        </>
    );
}