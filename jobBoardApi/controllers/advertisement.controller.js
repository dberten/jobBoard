const Advertisement = require('../model/ad.model');

exports.createAdvertisement = (req, res) => {
    if (!req.body) {
        res.status(400).send({
          message: "Content is empty!"
        });
    }
    console.log(req.body);
    const advertisement = new Advertisement({
        Date: req.body.Date,
        JobTitle: req.body.JobTitle,
        Society: req.body.Society,
        City: req.body.City,
        PostCode: req.body.PostCode,
        Description: req.body.Description,
        Missions: req.body.Missions,
        remuneration: req.body.remuneration,
    });
    Advertisement.create(advertisement, (err, data) => {
        if (err) {
            res.status(500).send({
            message: err.message || "Some error occurred while creating the advertisement."});
        }
        else
            res.send(data);
    });
};

exports.findOneAdvertisement = (req, res) => {
    Advertisement.findById(req.params.advertisementId, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found People with id ${req.params.advertisementId}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving People with id " + req.params.advertisementId
          });
        }
      } else res.send(data);
    });
  };

  exports.findAllAdvertisement = (req, res) => {
    Advertisement.getAll((err, data) => {
        if (err) {
            res.status(500).send({
            message: err.message || "Some error occurred while creating the advertisement."});
        }
        else
            res.send(data);
    });
};

exports.updateAdvertisement = (req, res) => {
    if (!req.body) {
        req.status(400).send({message: "Content is empty"});
    }
    Advertisement.updateById(req.params.advertisementId, new Advertisement(req.body), (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
              res.status(404).send({
                message: "Not found Advertisement with id " + req.params.advertisementId
              });
            } else {
              res.status(500).send({
                message: "Error updating Advertisement with id " + req.params.advertisementId
              });
            }
        } else res.send(data);
    });
};

exports.deleteAdvertisement = (req, res) => {
    Advertisement.rmAd(req.params.advertisementId, (err, data) => {
        if (err) {
            if (err.kind === "not_found")
                res.status(404).send({message: "Advertisement not found with id " + req.params.advertisementId});
            else 
                res.status(500).send({message: "Could not delete advertisement with id " + req.params.advertisementId});
        }
        else
            res.send({message: "Advertisement deleted successfully !"});
    });
};