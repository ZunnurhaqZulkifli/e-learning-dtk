import TimeTableCard from "../components/time-table-card";
import MasterLayout from "../master-layout";

export default function DashboardStudent({model}) {
    return (
        <>
            <MasterLayout>
                <h6 style={
                    {
                        fontSize: "1.5rem"
                    }
                }>
                    Welcome Back ! <a style={
                        {
                            fontSize: "0.8 rem",
                            fontStyle: "italic"
                        }
                    }>{model.name}</a>
                </h6>
                
                <h6 className='text-justify'>
                    We're glad you're back here!
                </h6>

                <div className="mt-4 mb-2">
                    <h3 className="card-title">My Learning</h3>
                </div>

                <div className="row">
                    <div className="col-8">
                        {model.courses.map((course) => {
                            return (
                                <div className="card mb-4"  key={course.id}>
                                    <div className="card-body" >
                                        <div className="row">
                                            <div className="col-10">
                                                <h4 className="">{course.name}</h4>
                                                <p className="card-text">You Have 6 pending assugnments</p>
                                            </div>
                                            <div className="col-2 d-flex justify-content-end">
                                                <a href={`/student/course/${course.id}`}>
                                                    <i className="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div className="row justify-content-start">
                                            {
                                                // course.subjects.map((subject) => {
                                                //     return (
                                                //         <div className="col-3 ml-2 card mt-2 bg-orange-50 bg-opacity-10" style={
                                                //             {
                                                //                 width: "16rem",
                                                //                 cursor: "pointer",
                                                //                 borderRadius: "0px"
                                                //             }
                                                //         }
                                                //         key={subject.id}
                                                //         >
                                                //         <img src="https://via.placeholder.com/100x100" className="p-2 mt-2" alt=""/>
                                                //             <div className="card-body">
                                                //                 <h6 className="card-title">{subject.name}</h6>
                                                //                 <p className="card-text">{subject.description}</p>
                                                //                 <a href={`/student/subject/${subject.id}`} className="btn btn-primary">View</a>
                                                //             </div>
                                                //         </div>
                                                //     );
                                                // })
                                            }
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                    </div>

                    <div className="col-4">
                        <TimeTableCard/>
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
        </>
    );
}
