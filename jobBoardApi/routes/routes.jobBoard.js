module.exports = app => {
    const People = require('../controllers/people.controller.js');
    const Advertisement = require('../controllers/advertisement.controller.js');
    const Companies = require('../controllers/companies.controller.js');
    const JobApplication = require('../controllers/jobApplication.controller.js');

    app.post('/People', People.createUser);
    app.get('/People', People.findAllUser)
    app.get('/People/:peopleId', People.findOneUser);
    app.put("/People/:peopleId", People.updateUser);
    app.delete("/People/:peopleId", People.deleteUser);
    app.post('/Advertisement', Advertisement.createAdvertisement);
    app.get('/Advertisement/:advertisementId', Advertisement.findOneAdvertisement);
    app.get('/Advertisement/', Advertisement.findAllAdvertisement);
    app.put('/Advertisement/:advertisementId', Advertisement.updateAdvertisement);
    app.delete('/Advertisement/:advertisementId', Advertisement.deleteAdvertisement);
    app.post('/Companies', Companies.createCompanies);
    app.get('/Companies/:companyId', Companies.findOneCompany);
    app.get('/Companies/', Companies.findAllCompanies);
    app.put('/Companies/:companyId', Companies.updateCompany);
    app.post('/JobApplication', JobApplication.createJob);
    app.get('/JobApplication', JobApplication.findAllJob);
    app.get('/JobApplication/:jobId', JobApplication.findOneJob);
    app.put('/JobApplication/:jobId', JobApplication.updateJob);
    app.delete('/JobApplication/:jobId', JobApplication.deleteJob);
};