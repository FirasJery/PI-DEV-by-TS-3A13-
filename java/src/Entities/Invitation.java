/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entities;

/**
 *
 * @author ASUS
 */
public class Invitation {
    private int id;
    private int idc;
    private String id_source;
    private String Invitation;
    
    public Invitation(int i, String s, String m){
        this.idc = i;
        this.id_source = s;
        this.Invitation = m;
    }
    
    public int getId(){
        return id;
    }

    public int getIdc() {
        return idc;
    }

    public void setIdc(int idc) {
        this.idc = idc;
    }

    public String getId_source() {
        return id_source;
    }

    public void setId_source(String id_source) {
        this.id_source = id_source;
    }

    public String getInvitation() {
        return Invitation;
    }

    public void setInvitation(String Invitation) {
        this.Invitation = Invitation;
    }
    
    
}
