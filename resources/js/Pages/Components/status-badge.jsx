export default function StatusBadge({status}) {
 return (
    <>
        {
            status === 'active' ? <span className="badge badge-success">Active</span> :
            status === 'inactive' ? <span className="badge badge-danger">Inactive</span> :
            status === 'pending' ? <span className="badge badge-warning">Pending</span> :
            status === 'completed' ? <span className="badge badge-info">Completed</span> :
            <span className="badge badge-secondary">Unknown</span>
        }
    </>
 ); 
}