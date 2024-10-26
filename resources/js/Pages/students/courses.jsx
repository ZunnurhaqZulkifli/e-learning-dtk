import React from 'react';
import MasterLayout from '../master-layout';
import CourseCatalogue from '../dashboards/dashboard-catalogue';

export default function StudentCourse({ model }) {
    return (
        <MasterLayout>
            <div className='row'>
                <div className='col-8'>
                    <div className='title'>Course</div>
                    <div className="card-title">{model.name}</div>
                    <div className="card-title">{model.code}</div>
                    <div className="card-title">{model.description}</div>
                </div>

                <div className='col-4'>
                    <p className='title'>Teacher Detail</p>
                    <p className="card-title">{model.teacher.name}</p>
                    <p className="card-title">{model.teacher.code}</p>
                </div>
            </div>
              <div className="row justify-content-start p-2">
                {model.subjects.map((subject) => (
                    <div className="col-md-12 card mt-2" key={subject.id}>
                        <img src="https://via.placeholder.com/1920x200" className="p-2 mt-2" alt={subject.name} />
                        <div className="card-body">
                            <h6 className="card-title">{subject.name}</h6>
                            <p className="card-text">{subject.description}</p>
                            <a href={`/student/subject/${subject.id}`} className="btn btn-primary">
                                <i className="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                ))}
            </div>
        </MasterLayout>
    );
}