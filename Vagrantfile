Vagrant.configure("2") do |config|
  # Box base i hostname
  config.vm.box = "debian/bookworm64"
  config.vm.hostname = "pj9f4a12-daessa.clotfje.net"

  # Definició i nom de la màquina
  config.vm.define "pj9f4a12-daessa" do |vm|
    vm.vm.provider "virtualbox" do |vb|
      vb.name = "pj9f4a12-daessa"
      vb.memory = 2048
      vb.cpus = 3
    end
  end

  # Xarxa: adaptador en mode bridge utilitzant la targeta indicada
  # (VirtualBox et pot demanar permisos per seleccionar la interfície la primera vegada)
  config.vm.network "public_network", bridge: "Intel(R) Dual Band Wireless-AC 8265"

  # Provisió: instal·lar paquets i configurar usuari/grups
  config.vm.provision "shell", inline: <<-SHELL
    set -e

    # Actualitzar i instal·lar eines sol·licitades
    apt-get update -y
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
      net-tools \
      whois \
      docker.io

    # Assegurar que el servei docker està engegat
    systemctl enable --now docker

    # Crear el grup 'dockers' si no existeix (segons la teva petició exacta)
    if ! getent group dockers >/dev/null 2>&1; then
      groupadd dockers
    fi

    # Afegir l'usuari vagrant tant al grup 'dockers' com al grup 'docker' (per accedir al socket)
    usermod -aG dockers vagrant || true
    usermod -aG docker vagrant || true

    # Configurar el hostname complet (FQDN)
    hostnamectl set-hostname pj9f4a12-daessa.clotfje.net

    # Afegir una entrada a /etc/hosts per al FQDN (mappeja a 127.0.1.1)
    if ! grep -q "pj9f4a12-daessa.clotfje.net" /etc/hosts; then
      echo "127.0.1.1 pj9f4a12-daessa.clotfje.net pj9f4a12-daessa" >> /etc/hosts
    fi

    # Final: mostrar estat de docker i grups per depuració
    echo "Docker version:"
    docker --version || true
    echo "Groups of vagrant user:"
    id vagrant || true
  SHELL
end