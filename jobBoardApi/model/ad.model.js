const sql = require('./db.js');

const Advertisement = function(advertisement) {
    this.Date = advertisement.Date;
    this.JobTitle = advertisement.JobTitle;
    this.Society = advertisement.Society;
    this.City = advertisement.City;
    this.PostCode = advertisement.PostCode;
    this.Description = advertisement.Description;
    this.Missions = advertisement.Missions;
    this.remuneration = advertisement.remuneration;
}

Advertisement.create = (newAdvertisement, result) => {
    sql.query("INSERT INTO Advertisement SET ?", newAdvertisement, (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("created advertisement:", {id: res.insertId, ...newAdvertisement});
        result(null, {id: res.insertId, ...newAdvertisement});
    });
};

Advertisement.findById = (advertisementId, result) => {
    sql.query("SELECT * FROM Advertisement WHERE id=" + advertisementId, (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        if (res.length) {
            console.log("found advertisement", res[0]);
            result(null, res[0]);
            return;
        }
        result({kind: "not_found"}, null);
    });
};

Advertisement.getAll = result => {
    sql.query("SELECT * FROM Advertisement", (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("Advertisement:", res);
        result(null, res);
    });
};

Advertisement.updateById = (id, advertisement, result) => {
    sql.query("UPDATE Advertisement SET Date=?, JobTitle=?, Society=?, City=?, PostCode=?, Description=?, Missions=?, remuneration=? WHERE id=" + id,
    [advertisement.Date, advertisement.JobTitle, advertisement.Society, advertisement.City, advertisement.PostCode, advertisement.Description, advertisement.Missions, advertisement.remuneration], (err, res) => {
        if (err) {
            console.log("error:", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log("updated advertisement: ", {id: id, ...advertisement});
        result(null, {id: id, ...advertisement});
    });
};

Advertisement.rmAd = (id, result) => {
    sql.query('DELETE FROM Advertisement WHERE id=' + id, (err, res) => {
        if (err) {
            console.log("error", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log('Deleted advertisement with id: ', id);
        result(null, res);
    });
};

module.exports = Advertisement;