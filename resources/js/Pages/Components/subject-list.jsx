export default function SubjectList({model}) {
    return (
        model.assignments.map((assignment) => {
            return (
                <div className="card mt-2 bg-orange-50 bg-opacity-10" style={
                    {
                        cursor: "pointer",
                        borderRadius: "0px"
                    }
                }
                key={assignment.id}
                >
                <img src="https://via.placeholder.com/1920x200" className="p-3" alt=""/>
                    <div className="card-body">
                        <div className="row">
                            <div className="col-6 justify-content-end">
                                <h6 className="card-title">{assignment.name} | {assignment.code}</h6>
                                <p className="card-text">{assignment.description}</p>
                                <a href={`/teacher/assingment/${assignment.id}`} className="btn btn-primary">View</a>
                            </div>

                            <div className="col-6">
                                <div className="accordion accordion-flush" id={`accordion-${assignment.id}`}>
                                    <div className="accordion-item">
                                        <h2 className="accordion-header" id={`heading-${assignment.id}`}>
                                            <button
                                                className="accordion-button collapsed"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target={`#flush-collapse-${assignment.id}`}
                                                aria-expanded="false"
                                                aria-controls={`flush-collapse-${assignment.id}`}>
                                                Student Submissions
                                            </button>
                                        </h2>
                                        <div
                                            id={`flush-collapse-${assignment.id}`}
                                            className="accordion-collapse collapse"
                                            data-bs-parent={`#accordion-${assignment.id}`}>
                                            {
                                                assignment.assignment_details === undefined ? (
                                                    <button className="btn btn-block">
                                                        No Submissions
                                                    </button>
                                                ) : (
                                                    assignment.assignment_details.map((student) => (
                                                        <div key={student.id}>
                                                            <button className="btn btn-block">
                                                                {student.name}
                                                            </button>
                                                        </div>
                                                    ))
                                                )
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            );
        })
)
}