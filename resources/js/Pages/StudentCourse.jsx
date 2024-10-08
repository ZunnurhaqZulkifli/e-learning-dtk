import React from 'react';
import MasterLayout from './MasterLayout';

export default function StudentCourse({ model }) {
    return (
        <MasterLayout>
            <div>
                <h3 className="card-title">Subjects</h3>
            </div>
              <div className="row justify-content-start">
                {model.subjects.map((subject) => (
                    <div className="col-md-4 col-sm-6 ml-2 card mt-2 bg-orange-50 bg-opacity-10" style={{
                        // width: "16rem",
                        // cursor: "pointer",
                        // borderRadius: "0px"
                    }} key={subject.id}>
                        <img src="https://via.placeholder.com/100x100" className="p-2 mt-2" alt={subject.name} />
                        <div className="card-body">
                            <h6 className="card-title">{subject.name}</h6>
                            <p className="card-text">{subject.description}</p>
                        </div>
                    </div>
                ))}
            </div>
        </MasterLayout>
    );
}