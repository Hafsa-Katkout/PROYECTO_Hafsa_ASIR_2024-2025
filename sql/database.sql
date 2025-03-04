
CREATE DATABASE actividad61HaKa;
USE actividad61HaKa;

CREATE TABLE productos (
    producto_id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100) NOT NULL,                
    descripcion TEXT,                            
    precio DECIMAL(10,2) NOT NULL,              
    stock INT NOT NULL,                          
    categoria VARCHAR(50) NOT NULL,              
    tendencia ENUM('Alta', 'Media', 'Baja') DEFAULT 'Media', 
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    visitas INT DEFAULT 0,                      
    calificacion DECIMAL(3,2) DEFAULT 0.0       
);

INSERT INTO productos (nombre, descripcion, precio, stock, categoria, tendencia, visitas, calificacion) VALUES
('CamisetaStreet', 'Algodón premium.', 24.99, 150, 'Ropa', 'Alta', 320, 4.8),
('GorraUrban', 'Ajustable grafiti.', 19.99, 75, 'Accesorios', 'Alta', 210, 4.5),
('SudaderaRebel', 'Capucha edición limitada.', 49.99, 50, 'Ropa', 'Media', 120, 4.7),
('BolsoTechno', 'Tela ecológica neón.', 34.99, 90, 'Accesorios', 'Alta', 280, 4.9),
('ZapatillasFlow', 'Sneakers pintados a mano.', 89.99, 40, 'Calzado', 'Alta', 410, 4.9),
('MochilaCyber', 'Resistente al agua.', 44.99, 60, 'Accesorios', 'Media', 180, 4.6),
('PendientesSpray', 'Mini bote spray.', 14.99, 110, 'Joyería', 'Baja', 95, 4.4),
('LamparaLED', 'Proyecta grafiti.', 59.99, 30, 'Decoración', 'Media', 145, 4.7),
('CuadroArt', 'Lienzo grafiti digital.', 79.99, 20, 'Decoración', 'Alta', 375, 5.0),
('CarteraUrban', 'Cuero sintético.', 29.99, 85, 'Accesorios', 'Media', 160, 4.5),
('CamisetaNeon', 'Brilla en la oscuridad.', 29.99, 70, 'Ropa', 'Alta', 330, 4.8),
('PosterKings', 'Edición limitada.', 19.99, 50, 'Decoración', 'Media', 215, 4.6),
('CamisetaSpray', 'Estampado en relieve.', 22.99, 120, 'Ropa', 'Alta', 350, 4.8),
('CamisetaPixel', 'Estilo retro gaming.', 24.99, 80, 'Ropa', 'Media', 280, 4.7),
('CamisetaHacker', 'Inspiración hacker.', 29.99, 60, 'Ropa', 'Alta', 410, 5.0),
('AuricularesBeats', 'Bluetooth grafiti.', 79.99, 50, 'Tecnología', 'Alta', 500, 4.9),
('SmartwatchStreet', 'Carátulas urbanas.', 119.99, 30, 'Tecnología', 'Alta', 390, 4.8),
('TecladoRGB', 'Mecánico gamer.', 99.99, 40, 'Tecnología', 'Alta', 460, 4.9),
('PowerBankUrban', 'Carga rápida.', 49.99, 100, 'Tecnología', 'Media', 250, 4.6),
('AltavozBass', 'Sonido envolvente.', 89.99, 70, 'Tecnología', 'Alta', 370, 4.7),
('MochilaSmart', 'USB integrado.', 59.99, 75, 'Accesorios', 'Alta', 420, 4.8),
('GorraLED', 'Mensajes personalizables.', 39.99, 50, 'Accesorios', 'Alta', 310, 4.7),
('PulseraNFC', 'Compartir redes.', 29.99, 95, 'Accesorios', 'Alta', 290, 4.6),
('CarteraRFID', 'Protección datos.', 34.99, 85, 'Accesorios', 'Media', 230, 4.5),
('ViniloVibes', 'Adhesivo pared.', 44.99, 40, 'Decoración', 'Media', 200, 4.6),
('LamparaHacker', 'Forma máscara.', 64.99, 30, 'Decoración', 'Alta', 310, 4.7),
('MousepadXL', 'Bordes iluminados.', 29.99, 65, 'Accesorios', 'Alta', 280, 4.8);





