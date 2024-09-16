export default function DashboardTeacher({model}) {
    return (
        <>
            <div className="p-4">
                <h1>Teacher Dashboard</h1>
                <h6 className='text-justify'>
                    Welcome to the teacher dashboard. Here, you can manage your courses, students, and other related information.
                </h6>
            </div>

            <div className="p-2 vh-100">
                <div className="card col-12 h-50">
                    Students
                    {model.students.map((student) => {
                        return (
                            <div className="card col-12">
                                <div className="card-body">
                                    <h5 className="card-title">{student.name}</h5>
                                    <p className="card-text">{student.email}</p>
                                </div>
                            </div>
                        );
                    })}
                </div>
            </div>

        </>
    );
}