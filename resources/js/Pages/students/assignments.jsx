import { useEffect, useState } from "react";
import MasterLayout from "../master-layout";

export default function StudentAssignments({ model, subjects }) {

    const [query, setQuery] = useState('');
    const [updatedSubjects, setUpdatedSubjects] = useState(subjects);

    useEffect(() => {
        if (query !== '') {
            const filteredSubjects = subjects.map((subject) => {
                const filteredAssignments = subject.assignments.filter((assignment) => {
                    return assignment.name.toLowerCase().includes(query.toLowerCase());
                })
                return { ...subject, assignments: filteredAssignments };
            }).filter((subject) => {
                return subject.name.toLowerCase().includes(query.toLowerCase()) || subject.assignments.length > 0;
            });

            setUpdatedSubjects(filteredSubjects);
        } else {
            setUpdatedSubjects(subjects);
        }
    }, [query, subjects]);

    return (
        <>
            <MasterLayout>
                <h3 className="card-title">Assignments</h3>
                <div className="justify-content-start">
                    <div className="p-2 row">
                        <input type="text" className="col-10" onChange={
                            (event) => {
                                setQuery(event.target.value);
                            }
                        } />
                        <div className="col-2">
                            <button children={'search'} className="btn btn-block btn-primary" />
                        </div>
                    </div>
                    {
                        updatedSubjects.map((subject, index) => {
                            return (
                                <div className="card mt-2 bg-opacity-10" key={index}>
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