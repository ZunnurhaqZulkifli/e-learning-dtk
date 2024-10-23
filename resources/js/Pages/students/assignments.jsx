import MasterLayout from "../master-layout";

export default function StudentAssignments({model, subjects}) {
    return(
        <>
            <MasterLayout>
                <h3 className="card-title">Assignments</h3>
                <div className="row justify-content-start">
                    {
                        subjects.map((subject, index) => {
                            return (
                                <div className="col-md-4 col-sm-6 ml-2 card mt-2 bg-opacity-10" key={index}>
                                    <div className="card-body">
                                        <h6 className="card-title">{subject.name}</h6>
                                        <p className="card-text">{subject.description}</p>
                                        {
                                            subject.assignments.map((assignment, index) => {
                                                return (
                                                    <div className="card mt-2 bg-opacity-10" key={index}>
                                                        <div className="card-body">
                                                            <h6 className="card-title">{assignment.name}</h6>
                                                            <p className="card-text">{assignment.description}</p>
                                                            <a href={`/student/assignment/${assignment.id}`} className="btn btn-primary">View</a>
                                                        </div>
                                                    </div>
                                                );
                                            })
                                        }
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