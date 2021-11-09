const sql = require('./db.js');

const Companies = function(companies) {
    this.name = companies.name;
    this.logo = companies.logo;
    this.adress = companies.adress;
    this.description = companies.description;
    this.nbEmployees = companies.nbEmployees;
    this.Activity = companies.Activity;
    this.nbFollowers = companies.nbFollowers;
    this.contact = companies.contact;
    this.posts = companies.posts;
};

Companies.create = (newCompanie, result) => {
    sql.query("INSERT INTO companies SET ?", newCompanie, (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("created company:", {id: res.insertId, ...newCompanie});
        result(null, {id: res.insertId, ...newCompanie});
    });
};

Companies.findById = (companyId, result) => {
    sql.query("SELECT * FROM companies WHERE id=" + companyId, (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        if (res.length) {
            console.log("found company", res[0]);
            result(null, res[0]);
            return;
        }
        result({kind: "not_found"}, null);
    });
};

Companies.getAll = result => {
    sql.query("SELECT * FROM companies", (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("company:", res);
        result(null, res);
    });
};

Companies.updateById = (id, company, result) => {
    sql.query("UPDATE companies SET name=?, logo=?, adress=?, description=?, nbEmployees=?, Activity=?, nbFollowers=?, contact=?, posts=? WHERE id=" + id,
    [company.name, company.logo, company.adress, company.description, company.nbEmployees, company.Activity, company.nbFollowers, company.contact, company.posts], (err, res) => {
        if (err) {
            console.log("error:", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log("updated company: ", {id: id, ...company});
        result(null, {id: id, ...company});
    });
};

Companies.rmCompany = (id, result) => {
    sql.query('DELETE FROM companies WHERE id=' + id, (err, res) => {
        if (err) {
            console.log("error", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log('Deleted company with id: ', id);
        result(null, res);
    });
};

module.exports = Companies;