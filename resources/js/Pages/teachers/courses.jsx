import StatusBadge from "../components/status-badge";
import MasterLayout from "../master-layout";

export default function CourseTeacher({model}) {
    return (
        <>
        <MasterLayout>
            <div className="">
                <h3 className="card-title">Subjects</h3>
            </div>

            <div className="">
                <h6 className="card-title">{model.name}</h6>
                <h6 className="card-title">{model.description}</h6>
                <h6 className="card-title">
                    <StatusBadge status={model.status}/>
                </h6>
                <h6 className="card-title">{model.students.length}</h6>
                <h6 className="card-title">{model.teacher.name}</h6>
            </div>

            <div className="row justify-content-start">
            {
                model.subjects.map((subject) => {
                    return (
                        <div className="col-3 ml-2 card mt-2 bg-orange-50 bg-opacity-10" style={
                            {
                                width: "16rem",
                                cursor: "pointer",
                                borderRadius: "0px"
                            }
                        }>
                        <img src="https://via.placeholder.com/100x100" className="p-2 mt-2" alt=""/>
                            <div class="card-body">
                                <h6 class="card-title">{subject.name}</h6>
                                <p class="card-text">{subject.description}</p>
                                <a href={`/teacher/subject/${subject.id}`} className="btn btn-primary">View</a>
                            </div>
                        </div>
                    );
                })
            }
        </div>
        </MasterLayout>
        </>
    );
}