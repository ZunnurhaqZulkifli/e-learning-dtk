export default function CoursesStats({ stats }) {
return (
<>
    <div>
        <h2>Statistik Pengguna</h2>
        <div className="row">
            <div className="col-md-3">
                <div className="card">
                    <div className="card-body">
                        <h5 className="card-title">Kursus</h5>
                        {/* <p className="card-text">{stats.courses}</p> */}
                    </div>
                </div>
            </div>
            <div className="col-md-3">
                <div className="card">
                    <div className="card-body">
                        <h5 className="card-title">Pelajar</h5>
                        {/* <p className="card-text">{stats.students}</p> */}
                    </div>
                </div>
            </div>
            <div className="col-md-3">
                <div className="card">
                    <div className="card-body">
                        <h5 className="card-title">Pengajar</h5>
                        {/* <p className="card-text">{stats.teachers}</p> */}
                    </div>
                </div>
            </div>
            <div className="col-md-3">
                <div className="card">
                    <div className="card-body">
                        <h5 className="card-title">Pendaftaran</h5>
                        {/* <p className="card-text">{stats.enrollments}</p> */}
                    </div>
                </div>
            </div>
        </div>
    </div>
</>
);
}
