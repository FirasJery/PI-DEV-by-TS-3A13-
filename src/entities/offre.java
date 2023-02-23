/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

public class offre {
    int id_offre;
    private String title;
    private String description;
    private String category;
    private String type;
    private String checkpoint;
    private String duree;

    public offre() {//constructeur feragh
        
    }

    public int getId_offre() {
        return id_offre;
    }

    public String getTitle() {
        return title;
    }

    public String getDescription() {
        return description;
    }

    public String getCategory() {
        return category;
    }

    public String getType() {
        return type;
    }

    public String getCheckpoint() {
        return checkpoint;
    }

    public String getDuree() {
        return duree;
    }

    public void setId_offre(int id_offre) {
        this.id_offre = id_offre;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public void setType(String type) {
        this.type = type;
    }

    public void setCheckpoint(String checkpoint) {
        this.checkpoint = checkpoint;
    }

    public void setDuree(String duree) {
        this.duree = duree;
    }

    public offre(String title, String description, String category, String type, String checkpoint, String duree) {
        this.title = title;
        this.description = description;
        this.category = category;
        this.type = type;
        this.checkpoint = checkpoint;
        this.duree = duree;
    }

    public offre(int id_offre, String title, String description, String category, String type, String checkpoint, String duree) {
        this.id_offre = id_offre;
        this.title = title;
        this.description = description;
        this.category = category;
        this.type = type;
        this.checkpoint = checkpoint;
        this.duree = duree;
    }

    @Override
    public String toString() {
        return "offre{" + "id_offre=" + id_offre + ", title=" + title + ", description=" + description + ", category=" + category + ", type=" + type + ", checkpoint=" + checkpoint + ", duree=" + duree + '}';
    }
    

}
