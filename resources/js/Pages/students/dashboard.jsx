import { Fragment, useEffect, useState } from "react";
import TimeTableCard from "../components/time-table-card";
import MasterLayout from "../master-layout";

export default function DashboardStudent({ model }) {

    const [query, setQuery] = useState('');
    const [updatedModels, setUpdatedModels] = useState(model);

    useEffect(() => {
        if (query !== '') {
            const filteredCourses = model.courses.map((course) => {
                const filteredSubjects = course.subjects.filter((subject) => {
                    return subject.name.toLowerCase().includes(query.toLowerCase());
                });
                return { ...course, subjects: filteredSubjects };
            }).filter((course) => {
                return course.name.toLowerCase().includes(query.toLowerCase()) || course.subjects.length > 0;
            });

            setUpdatedModels({ ...model, courses: filteredCourses });
        } else {
            setUpdatedModels(model);
        }
    }, [query, model]);

    return (
        <MasterLayout>
            <h4>
                Welcome Back ! <a>{model.name}</a>
            </h4>

            <div className="row mt-4">
                <div className="col-8">
                    <div className="mb-4">
                        <div className="p-2 row">
                            <input type="text" className="col-10" onChange={
                                (event) => {
                                    setQuery(event.target.value);
                                }
                            } />
                            <div className="col-2">
                                <button children={'search'} className="btn btn-block btn-primary w-100" />
                            </div>
                        </div>
                    </div>
                    {updatedModels.courses.map((course, index) => {
                        return (
                            <Fragment key={course.id}>
                                <hr />
                                <div className="mb-4 row" key={course.id}>
                                    <div className="row">
                                        <div className="col-10">
                                            <h4 className="">{course.name}</h4>
                                            <p className="">You Have 6 pending assugnments</p>
                                        </div>
                                        <div className="col-2 d-flex justify-content-end">
                                            <a href={`/student/course/${course.id}`}>
                                                <label htmlFor="">Lihat</label>
                                                <i className="bi bi-eye ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div className="row justify-content-start">
                                        {
                                            course.subjects.map((subject) => {
                                                return (
                                                    <div className="col-3 ml-2 card mt-2 bg-orange-50 bg-opacity-10" style={
                                                        {
                                                            width: "18rem",
                                                            cursor: "pointer",
                                                            borderRadius: "0px"
                                                        }
                                                    }
                                                        key={subject.id}
                                                    >
                                                        <img src="https://via.placeholder.com/100x100" className="p-2 mt-2" alt="" />
                                                        <div className="card-body">
                                                            <h6 className="card-title">{subject.name}</h6>
                                                            <p className="card-text">{subject.description}</p>
                                                            <a href={`/student/subject/${subject.id}`} className="btn btn-primary">
                                                                <i className="bi bi-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                );
                                            })
                                        }
                                    </div>
                                </div>
                            </Fragment>
                        );
                    })}
                </div>

                <div className="col-4">
                    <TimeTableCard />
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title">Previous Notes</h5>
                        </div>
                    </div>

                    <div>
                        kene buat lists of previous worked on courses
                    </div>
                </div>
            </div>
        </MasterLayout>
    );
}
