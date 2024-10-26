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
                            <div className="card-text">Target Mark : {assignment.target_mark}</div>
                            <div className="card-text">Name : {assignment.name}</div>
                            <div className="card-text">Code : {assignment.code}</div>
                            <div className="card-text">Description : {assignment.description}</div>
                            <div className="card-text">Status : {assignment.status}</div>
                            <div className="card-text">Created : {assignment.created_at}</div>

                            <div className="card mt-2 bg-opacity-10">
                                <div className="card-body">
                                    <h6 className="card-title">{assignmentDetail != null ? assignmentDetail.name : 'Please Submit Your Assignment Here'}</h6>
                                    <p className="card-text">{assignmentDetail != null ? assignmentDetail.description : ''}</p>

                                    {assignmentDetail && (
                                        <table className="table table-sm mt-3">
                                            <tbody>
                                                <tr>
                                                    <td>Assignment</td>
                                                    <td>{assignmentDetail.assignment.name}</td>
                                                </tr>
                                                <tr>
                                                    <td>Teacher</td>
                                                    <td>{assignmentDetail.teacher.name}</td>
                                                </tr>
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td>{assignmentDetail.name}</td>
                                                </tr>
                                                <tr>
                                                    <td>Code</td>
                                                    <td>{assignmentDetail.code}</td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>{assignmentDetail.description}</td>
                                                </tr>
                                                <tr>
                                                    <td>Marks</td>
                                                    <td>{assignmentDetail.marks}  / {assignment.target_mark}</td>
                                                </tr>
                                                <tr>
                                                    <td>Completed</td>
                                                    <td>{assignmentDetail.is_completed == 1 ? 'True' : 'False'}</td>
                                                </tr>
                                                <tr>
                                                    <td>Assignment Date</td>
                                                    <td>{assignmentDetail.start_date}</td>
                                                </tr>
                                                <tr>
                                                    <td>Submission Date</td>
                                                    <td>{assignmentDetail.submitted_at}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>{assignmentDetail.status}</td>
                                                </tr>
                                                <tr>
                                                    <td>File</td>
                                                    <td>{assignmentDetail.file}</td>
                                                </tr>
                                                <tr>
                                                    <td>Graded</td>
                                                    <td>{assignmentDetail.is_graded}</td>
                                                </tr>
                                                <tr>
                                                    <td>Submitted At</td>
                                                    <td>{assignmentDetail.created_at}</td>
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
                                                        <a href={`/student/subject/${assignment.subject_id}`} className="btn btn-primary ml-2">Back</a>
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