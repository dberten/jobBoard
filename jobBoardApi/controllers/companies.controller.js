const Companies = require('../model/companies.model.js');

exports.createCompanies = (req, res) => {
    if (!req.body) {
        res.status(400).send({
          message: "Content is empty!"
        });
    }
    console.log(req.body);
    const companie = new Companies({
        name: req.body.name,
        logo: req.body.logo,
        adress: req.body.adress,
        description: req.body.description,
        nbEmployees: req.body.nbEmployees,
        Activity: req.body.Activity,
        nbFollowers: req.body.nbFollowers,
        contact: req.body.contact,
        posts: req.body.posts
    });
    Companies.create(companie, (err, data) => {
        if (err) {
            res.status(500).send({
            message: err.message || "Some error occurred while creating the company."});
        }
        else
            res.send(data);
    });
};

exports.findOneCompany = (req, res) => {
    Companies.findById(req.params.companyId, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found company with id ${req.params.companyId}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving company with id " + req.params.companyId
          });
        }
      } else res.send(data);
    });
};

exports.findAllCompanies = (req, res) => {
    Companies.getAll((err, data) => {
        if (err) {
            res.status(500).send({
            message: err.message || "Some error occurred while creating the user."});
        }
        else
            res.send(data);
    });
};

exports.updateCompany = (req, res) => {
    if (!req.body) {
        req.status(400).send({message: "Content is empty"});
    }
    Companies.updateById(req.params.companyId, new Companies(req.body), (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
              res.status(404).send({
                message: "Not found company with id " + req.params.companyId
              });
            } else {
              res.status(500).send({
                message: "Error updating company with id " + req.params.companyId
              });
            }
        } else res.send(data);
    });
};

exports.deleteCompany = (req, res) => {
    Companies.rmCompany(req.params.companyId, (err, data) => {
        if (err) {
            if (err.kind === "not_found")
                res.status(404).send({message: "User not found with id " + req.params.companyId});
            else 
                res.status(500).send({message: "Could not delete company with id " + req.params.companyId});
        }
        else
            res.send({message: "User deleted successfully !"});
    });
};