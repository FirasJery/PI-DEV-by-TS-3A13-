/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entite;

/**
 *
 * @author Ghass
 */
public class facture {
    
    private long id;
    private float montant_p;
    private float montant_r;
    private long wallet_r;
    private long wallet_s;
    private String type;
    private long id_user;
    
    public facture(){}

    public facture(long id, float montant_p, float montant_r, long wallet_r, long wallet_s, String type, long id_user) {
        this.id = id;
        this.montant_p = montant_p;
        this.montant_r = montant_r;
        this.wallet_r = wallet_r;
        this.wallet_s = wallet_s;
        this.type = type;
        this.id_user = id_user;
    }

    public facture(float montant_p, float montant_r, long wallet_r, long wallet_s, String type, long id_user) {
        this.montant_p = montant_p;
        this.montant_r = montant_r;
        this.wallet_r = wallet_r;
        this.wallet_s = wallet_s;
        this.type = type;
        this.id_user = id_user;
    }

    public long getId() {
        return id;
    }

    public float getMontant_p() {
        return montant_p;
    }

    public float getMontant_r() {
        return montant_r;
    }

    public long getWallet_r() {
        return wallet_r;
    }

    public long getWallet_s() {
        return wallet_s;
    }

    public String getType() {
        return type;
    }

    public long getId_user() {
        return id_user;
    }

    public void setId(long id) {
        this.id = id;
    }

    public void setMontant_p(float montant_p) {
        this.montant_p = montant_p;
    }

    public void setMontant_r(float montant_r) {
        this.montant_r = montant_r;
    }

    public void setWallet_r(long wallet_r) {
        this.wallet_r = wallet_r;
    }

    public void setWallet_s(long wallet_s) {
        this.wallet_s = wallet_s;
    }

    public void setType(String type) {
        this.type = type;
    }

    public void setId_user(long id_user) {
        this.id_user = id_user;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 41 * hash + (int) (this.id ^ (this.id >>> 32));
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final facture other = (facture) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }
    
}
