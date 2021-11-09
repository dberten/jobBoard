const JobApplication = require('../model/jobApplication.model.js');

exports.createJob = (req, res) => {
    if (!req.body) {
        res.status(400).send({
            message: "Content is empty"
        });
    }
    console.log(req.body);
    const jobApplication = new JobApplication({
        date: req.body.date,
        idAd: req.body.idAd,
        idPeople: req.body.idPeople,
        mails: req.body.mails,
        msg: req.body.msg
    });
    JobApplication.create(jobApplication, (err, data) => {
        if (err) {
            res.status(500).send({
                message: err.message || "Some error occurred while creating the jobApplication."
            });
        }
        else
            res.send(data);
    });
};

exports.findOneJob = (req, res) => {
    JobApplication.findById(req.params.jobId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: 'Not found job with id' + res.params.jobId
                });
            } else {
                res.status(500).send({
                    message: 'Error retrieving job with id' + res.params.jobId
                })
            }
        } else res.send(data);
    });
};

exports.findAllJob = (req, res) => {
    JobApplication.getAll((err, data) => {
        if (err) {
            res.status(500).send({
                message: err.message || "Some error occurred while creating the Job"
            });
        } else res.send(data);
    });
};

exports.updateJob = (req, res) => {
    if (!req.body) 
        req.status(400).send({message: "Content is empty"});
    JobApplication.updateById(req.params.jobId, new JobApplication(req.body), (err,data) => {
        if (err) {
            if (err.kind === "not_found")
                res.status(404).send({message: 'Not found job with id' + req.params.jobId});
            else
                res.status(500).send({message: 'Error updating job with id' + req.params.jobId});
        } else res.send(data);
    });
};

exports.deleteJob = (req, res) => {
    JobApplication.rmJob(req.params.jobId, (err, data) => {
        if (err) {
            if (err.kind === "not_found")
                res.status(404).send({message: "Job not found with id: " + req.params.jobId});
            else
                res.status(500).send({message: 'Could not delete job with id: ' + req.params.jobId});
        } else res.send({message: 'Job deleted sucessfully !'});
    });
};