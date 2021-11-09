const People = require('../model/people.model.js');

exports.createUser = (req, res) => {
    if (!req.body) {
        res.status(400).send({
          message: "Content is empty!"
        });
    }
    console.log(req.body);
    const people = new People({
        Surname: req.body.Surname,
        Lastname: req.body.Lastname,
        City: req.body.City,
        Region: req.body.Region,
        JobTitle: req.body.JobTitle,
        mail: req.body.mail,
        WorkExperience: req.body.WorkExperience,
        Education: req.body.Education,
        password: req.body.password,
        admin: req.body.admin,
    });
    People.create(people, (err, data) => {
        if (err) {
            res.status(500).send({
            message: err.message || "Some error occurred while creating the user."});
        }
        else
            res.send(data);
    });
};

exports.findAllUser = (req, res) => {
    People.getAll((err, data) => {
        if (err) {
            res.status(500).send({
            message: err.message || "Some error occurred while creating the user."});
        }
        else
            res.send(data);
    });
};

exports.findOneUser = (req, res) => {
    People.findById(req.params.peopleId, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found People with id ${req.params.peopleId}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving People with id " + req.params.peopleId
          });
        }
      } else res.send(data);
    });
  };
  
exports.updateUser = (req, res) => {
    if (!req.body) {
        req.status(400).send({message: "Content is empty"});
    }
    People.updateById(req.params.peopleId, new People(req.body), (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
              res.status(404).send({
                message: "Not found Customer with id " + req.params.peopleId
              });
            } else {
              res.status(500).send({
                message: "Error updating Customer with id " + req.params.peopleId
              });
            }
        } else res.send(data);
    });
};

exports.deleteUser = (req, res) => {
    People.rmUser(req.params.peopleId, (err, data) => {
        if (err) {
            if (err.kind === "not_found")
                res.status(404).send({message: "User not found with id " + req.params.peopleId});
            else 
                res.status(500).send({message: "Could not delete user with id " + req.params.peopleId});
        }
        else
            res.send({message: "User deleted successfully !"});
    });
};