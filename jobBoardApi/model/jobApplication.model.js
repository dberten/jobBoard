const sql = require('./db.js');

const JobApplication = function(jobApplication) {
    this.date = jobApplication.date;
    this.idAd = jobApplication.idAd;
    this.idPeople = jobApplication.idPeople;
    this.mails = jobApplication.mails;
    this.msg = jobApplication.msg;
}

JobApplication.create = (newJob, result) => {
    sql.query("INSERT INTO jobApplication SET ?", newJob, (err, res) => {
        if (err) {
            console.log("error", err);
            result(err, null);
            return;
        }
        console.log("created JobApplication", {id: res.insertId, ...newJob});
        result(null, {id: res.insertId, ...newJob});
    });
};

JobApplication.findById = (jobId, result) => {
    sql.query("SELECT * FROM jobApplication WHERE id=" + jobId, (err, res) => {
        if (err) {
            console.log("error", err);
            result(err, null);
            return;
        }
        if (res.length) {
            console.log("found JobApplication", res[0]);
            result(null, res[0]);
            return;
        }
        result({kind: "not_found"}, null);
    });
};

JobApplication.getAll = result => {
    sql.query("SELECT * FROM jobApplication", (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("jobApplication", res);
        result(null, res);
    });
};

JobApplication.updateById = (id, job, result) => {
    sql.query("UPDATE jobApplication SET date=?, idAd=?, idPeople=?, mails=?, msg=? WHERE id=" + id,
    [job.date, job.idAd, job.idPeople, job.mails, job.msg], (err, res) => {
        if (err) {
            console.log("error:", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log("updated jobApplication:", {id: id, ...job});
        result(null, {id: id, ...job});
    });
};

JobApplication.rmJob = (id, result) => {
    sql.query('DELETE FROM jobApplication WHERE id=' + id, (err, res) => {
        if (err) {
            console.log("error", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log("Deleted job with id: ", id);
        result(null, res);
    });
};

module.exports = JobApplication;