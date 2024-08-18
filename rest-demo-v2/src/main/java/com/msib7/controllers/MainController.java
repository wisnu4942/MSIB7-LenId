package com.msib7.controllers;

import com.msib7.models.Lokasi;
import com.msib7.models.Proyek;
import com.msib7.repository.LokasiRepository;
import com.msib7.repository.ProyekRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import com.msib7.exceptions.ResourceNotFoundException;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

@RestController
@RequestMapping("/api")
public class MainController {
    
    @Autowired
    private LokasiRepository lokasiRepository;

    @Autowired
    private ProyekRepository proyekRepository;

    // a. POST /lokasi
    @PostMapping("/lokasi")
    public Lokasi createLokasi(@RequestBody Lokasi lokasi) {
        return lokasiRepository.save(lokasi);
    }

    // b. GET /lokasi
    @GetMapping("/lokasi")
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    // c. PUT /lokasi
    @PutMapping("/lokasi/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable Long id, @RequestBody Lokasi lokasiDetails) {
        Lokasi lokasi = lokasiRepository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Lokasi not found with id " + id));
        lokasi.setNamaLokasi(lokasiDetails.getNamaLokasi());
        lokasi.setNegara(lokasiDetails.getNegara());
        lokasi.setProvinsi(lokasiDetails.getProvinsi());
        lokasi.setKota(lokasiDetails.getKota());
        Lokasi updatedLokasi = lokasiRepository.save(lokasi);
        return ResponseEntity.ok(updatedLokasi);
    }

    // d. DELETE /lokasi
    @DeleteMapping("/lokasi/{id}")
    public ResponseEntity<Map<String, Boolean>> deleteLokasi(@PathVariable Long id) {
        Lokasi lokasi = lokasiRepository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Lokasi not found with id " + id));
        lokasiRepository.delete(lokasi);
        Map<String, Boolean> response = new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return ResponseEntity.ok(response);
    }

    // e. POST /proyek
    @PostMapping("/proyek")
    public Proyek createProyek(@RequestBody Proyek proyek) {
        return proyekRepository.save(proyek);
    }

    // f. GET /proyek
    @GetMapping("/proyek")
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    // g. PUT /proyek
    @PutMapping("/proyek/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable Long id, @RequestBody Proyek proyekDetails) {
        Proyek proyek = proyekRepository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Proyek not found with id " + id));
        proyek.setNamaProyek(proyekDetails.getNamaProyek());
        proyek.setClient(proyekDetails.getClient());
        proyek.setTglMulai(proyekDetails.getTglMulai());
        proyek.setTglSelesai(proyekDetails.getTglSelesai());
        proyek.setPimpinanProyek(proyekDetails.getPimpinanProyek());
        proyek.setKeterangan(proyekDetails.getKeterangan());
        Proyek updatedProyek = proyekRepository.save(proyek);
        return ResponseEntity.ok(updatedProyek);
    }

    // h. DELETE /proyek
    @DeleteMapping("/proyek/{id}")
    public ResponseEntity<Map<String, Boolean>> deleteProyek(@PathVariable Long id) {
        Proyek proyek = proyekRepository.findById(id).orElseThrow(() -> new ResourceNotFoundException("Proyek not found with id " + id));
        proyekRepository.delete(proyek);
        Map<String, Boolean> response = new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return ResponseEntity.ok(response);
    }
}
