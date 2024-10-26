import ReactPlayer from "react-player";
import MasterLayout from "../master-layout";
import AssingmentList from "./components/assingment-list";
import { useState } from "react";

export default function StudentSubject({ model, student }) {

    const [notes, setNotes] = useState('');

    return (
        <>
            <MasterLayout>
                <div className="row">
                    <div className="col-8">
                        <div className="mb-2">
                            <h3 className="card-title">{model.name}</h3>
                        </div>
                        <div className="card bg-orange-50 bg-opacity-10">

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

                            {/* <div className="card-body">
                                <h6 className="card-title">{model.description}</h6>
                                <a href={`/teacher/assignment/1`} className="btn btn-primary">View</a>
                            </div> */}
                        </div>
                    </div>

                    <div className="col-4">
                        <div className="mb-2">
                            <h3 className="card-title">Assignments</h3>
                        </div>
                        
                        <div className="card mt-2 bg-orange-50 bg-opacity-10">
                            <div className="p-2">
                                <div className="fs-7 mb-1">My Score</div>
                                <div className="progress">
                                    <div className="progress-bar" role="progressbar" style={{ width: `${model.total_marks}%` }} aria-valuenow={model.total_marks} aria-valuemin="0" aria-valuemax="100">
                                        {model.total_marks}%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <AssingmentList model={model} />
                    </div>
                </div>

                <div className="card mt-5">
                    <div className="card-body">
                        {
                            model.notes !== null ? (
                                <div>
                                    <div className="card-title">My Notes</div>
                                    {model.notes.map((note) => (
                                        <div key={note.id} className="card-title">
                                            {note.note}
                                            <div className="fs-7 text-muted">{note.created_at}</div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <></>
                            )
                        }
                        <form action={route('notes-store', { id: model.id })} className="">
                            <input name="student_id" type="text" value={student.id} hidden />
                            <input name="subject_id" type="text" value={model.id} hidden />
                            <h5 className="card-title">Notes</h5>
                            <div className="mb-2">
                                <textarea
                                    name="note"
                                    className="form-control"
                                    placeholder="Type your message here..."
                                    onChange={
                                        (e) => {

                                            setNotes(e.target.value);
                                        }
                                    }
                                />
                            </div>
                            <div>
                                <button disabled={notes === ''} className="btn btn-primary">Add Note</button>
                            </div>
                        </form>
                    </div>
                </div>
            </MasterLayout>
        </>
    );
}