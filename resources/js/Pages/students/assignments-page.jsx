import MasterLayout from "../master-layout";

export default function StudentAssignmentPage({ assignment, assignmentDetail }) {
    return (
        <MasterLayout>
            <h3>Assignments</h3>
            <div className="card">
                <div className="row">
                    <div className="">
                        <div className="card-body">
                            <h6 className="card-title">{assignment.name}</h6>
                            <p className="card-text">{assignment.description}</p>
                            <p>{assignment.target_mark}</p>
                            <p>{assignment.name}</p>
                            <p>{assignment.code}</p>
                            <p>{assignment.description}</p>
                            <p>{assignment.status}</p>
                            <p>{assignment.created_at}</p>

                            <div className="card mt-2 bg-opacity-10">
                                <div className="card-body">
                                    <h6 className="card-title">{assignmentDetail != null ? assignmentDetail.name : 'Please Submit Your Assignment Here'}</h6>
                                    <p className="card-text">{assignmentDetail != null ? assignmentDetail.description : ''}</p>

                                    {assignmentDetail && (
                                        <table className="table table-bordered table-sm mt-3">
                                            <tbody>
                                                <tr>
                                                    <td>assignment_id</td>
                                                    <td>{assignmentDetail.assignment.name}</td>
                                                </tr>
                                                <tr>
                                                    <td>teacher_id</td>
                                                    <td>{assignmentDetail.teacher.name}</td>
                                                </tr>
                                                <tr>
                                                    <td>name</td>
                                                    <td>{assignmentDetail.name}</td>
                                                </tr>
                                                <tr>
                                                    <td>code</td>
                                                    <td>{assignmentDetail.code}</td>
                                                </tr>
                                                <tr>
                                                    <td>description</td>
                                                    <td>{assignmentDetail.description}</td>
                                                </tr>
                                                <tr>
                                                    <td>marks</td>
                                                    <td>{assignmentDetail.marks}  / {assignment.target_mark}</td>
                                                </tr>
                                                <tr>
                                                    <td>is_completed</td>
                                                    <td>{assignmentDetail.is_completed == 1 ? 'True' : 'False'}</td>
                                                </tr>
                                                <tr>
                                                    <td>start_date</td>
                                                    <td>{assignmentDetail.start_date}</td>
                                                </tr>
                                                <tr>
                                                    <td>submitted_at</td>
                                                    <td>{assignmentDetail.submitted_at}</td>
                                                </tr>
                                                <tr>
                                                    <td>status</td>
                                                    <td>{assignmentDetail.status}</td>
                                                </tr>
                                                <tr>
                                                    <td>file</td>
                                                    <td>{assignmentDetail.file}</td>
                                                </tr>
                                                <tr>
                                                    <td>is_graded</td>
                                                    <td>{assignmentDetail.is_graded}</td>
                                                </tr>
                                                <tr>
                                                    <td>Submitted At</td>
                                                    <td>{assignmentDetail.created_at}</td>
                                                </tr>
                                                <tr>
                                                    <td>updated_at</td>
                                                    <td>{assignmentDetail.updated_at}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    )}

                                    {
                                        assignmentDetail != null ? (
                                            <>
                                                <div className="row">
                                                    <div className="col-4">
                                                        <button className="btn btn-success text-dark">Submmitted</button>
                                                        <a href={`/student/assignment/${assignmentDetail.id}`} className="btn btn-primary ms-2">View</a>
                                                    </div>
                                                </div>
                                            </>
                                        ) : (
                                            <>
                                                <div className="form-group">
                                                    <label htmlFor="file">Please Include Your Assignment</label>
                                                    <input type="file" className="form-control" id="file" />
                                                    <button className="mt-2 btn btn-primary">Submmit</button>
                                                </div>
                                            </>
                                        )
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </MasterLayout>
    );
}